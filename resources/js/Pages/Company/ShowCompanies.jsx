import React, { useState } from 'react';
import { router, Head } from '@inertiajs/react';
import Header from '@/Components/Header';
import DeleteModal from '@/Components/DeleteModal';

const ShowCompanies = ({ companies }) => {
  const [showModal, setShowModal] = useState(false);
  const [selectedCompanyId, setSelectedCompanyId] = useState(null);

  const handleAdd = () => {
    router.visit('/companies/create');
  };

  const handleEdit = (id) => {
    router.visit(`/companies/${id}/edit`);
  };

  const handleDelete = (id) => {
    setSelectedCompanyId(id);
    setShowModal(true);
  };

  const handleConfirmDelete = () => {
    router.delete(`/companies/${selectedCompanyId}`, {
      onSuccess: () => {
        setShowModal(false);
      },
      onError: (error) => {
        console.error(error);
        setShowModal(false);
      }
    });
  };

  return (
    <>
      <Head title="Empresas" />
      <div className="dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none shadow-md">
        <Header />
        <div className="flex justify-center items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900">
          <div className="w-full max-w-4xl p-8 dark:text-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none shadow-md">
            <h1 className="text-xl text-center font-mono">EMPRESAS</h1>
            <button
              onClick={handleAdd}
              className="linear flex flex-row items-center bg-cyan-600 mb-5 rounded-xl px-5 py-3 text-base font-medium text-white"
              data-ripple-light
            >
              <svg xmlns="https://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              Adicionar
            </button>

            <table className="min-w-full divide-y divide-gray-600 text-white shadow-xl">
              <thead className="dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none rounded shadow-md">
                <tr>
                  <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">#</th>
                  <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Título da Empresa</th>
                  <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Contatos</th>
                  <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ações</th>
                </tr>
              </thead>
              <tbody className="dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none rounded shadow-md divide-y divide-gray-600">
                {companies.map(company => (
                  <tr key={company.id}>
                    <td className="px-6 py-4 whitespace-nowrap">{company.id}</td>
                    <td className="px-6 py-4 whitespace-nowrap">{company.title}</td>
                    <td className="px-6 py-4 whitespace-nowrap">
                      {company.contacts.length > 0 ? (
                        <ul>
                          {company.contacts.map(contact => (
                            <li key={contact.id}>{contact.name} {contact.last_name}</li>
                          ))}
                        </ul>
                      ) : (
                        <span>Nenhum contato associado</span>
                      )}
                    </td>
                    <td className="px-6 py-4 whitespace-nowrap">
                      <button onClick={() => handleEdit(company.id)} className="text-slate-800 text-sm bg-cyan-600 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                        <span>
                          <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>
                        </span>
                      </button>
                      <button onClick={() => handleDelete(company.id)} className="text-black text-sm bg-red-400 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                        <span>
                          <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                        </span>
                      </button>
                      <DeleteModal
                        show={showModal}
                        onClose={() => setShowModal(false)}
                        onConfirm={handleConfirmDelete}
                      />
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </>
  );
};

export default ShowCompanies;
