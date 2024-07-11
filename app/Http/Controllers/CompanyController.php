<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Services\Bitrix24Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    protected $bitrix24Service;

    public function __construct(Bitrix24Service $bitrix24Service)
    {
        $this->bitrix24Service = $bitrix24Service;
    }
    
    public function index()
    {
        $companies = Company::with('contacts')->get();

        Inertia::share('companies', $companies);
        
        return Inertia::render('Company/ShowCompanies', [
            'companies' => $companies
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->load('contacts');

        return response()->json($company);
    }

    public function create()
    {
        return Inertia::render('Company/AddCompany');
    }

    public function store(Request $request)
    {
        $company = Company::create([
            'title' => $request->input('title'),
            'email' => $request->input('email'),
        ]);

        $bitrixCompany = $this->bitrix24Service->getCRMScope()->company()->add([
            'TITLE' => $request->input('title'),
            'EMAIL' => $request->input('email')
        ]);

        $bitrixCompanyId = $bitrixCompany->getId();

        foreach ($request->input('contacts') as $contactData) {
            $contact = Contact::create([
                'name' => $contactData['name'],
                'last_name' => $contactData['last_name'],
            ]);
            $company->contacts()->attach($contact);

            $this->bitrix24Service->getCRMScope()->contact()->add([
                'NAME' => $contactData['name'],
                'LAST_NAME' => $contactData['last_name'],
                'COMPANY_ID' => $bitrixCompanyId,
            ]);
        }
        
        return redirect()->route('companies.index')->with('success', 'Empresa cadastrada com sucesso.');
    }

    public function edit($id)
    {
        $company = Company::with('contacts')->findOrFail($id);
        return inertia('Company/EditCompanyForm', [
            'company' => $company
        ]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'contacts' => 'array',
            'contacts.*.id' => 'nullable|integer|exists:contacts,id',
            'contacts.*.name' => 'nullable|string|max:255',
            'contacts.*.last_name' => 'nullable|string|max:255',
        ]);

        $company->update($request->only('title', 'email'));

        $contactsToSync = [];
        foreach ($request->contacts as $contact) {
            if (!empty($contact['name']) || !empty($contact['last_name'])) {
                if (isset($contact['id'])) {
                    $existingContact = Contact::findOrFail($contact['id']);
                    $existingContact->update([
                        'name' => $contact['name'],
                        'last_name' => $contact['last_name'],
                    ]);
                    $contactsToSync[] = $existingContact->id;
                } else {
                    $newContact = Contact::create([
                        'name' => $contact['name'],
                        'last_name' => $contact['last_name'],
                    ]);
                    $contactsToSync[] = $newContact->id;
                }
            }
        }

        $company->contacts()->sync($contactsToSync);

        return redirect()->route('companies.index')->with('success', 'Empresa atualizada com sucesso.');
    }


    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Empresa excluída com sucesso.');
    }
}
