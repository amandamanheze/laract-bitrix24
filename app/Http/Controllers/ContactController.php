<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\Bitrix24Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    protected $bitrixService;

    public function __construct(Bitrix24Service $bitrixService)
    {
        $this->bitrixService = $bitrixService;
    }

    public function create()
    {
        return Inertia::render('AddContactForm');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $contact = Contact::create([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
        ]);

        return response()->json(['message' => 'Contact created successfully', 'contact' => $contact], 201);
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
