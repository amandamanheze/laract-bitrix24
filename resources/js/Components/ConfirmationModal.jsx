import React from 'react';

export default function ConfirmationModal({ show, onClose }) {
  if (!show) return null;

  return (
    <div className="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 dark:text-white">
      <div className="relative p-4 w-full max-w-md h-full md:h-auto">
        <div className="relative p-4 text-center bg-white rounded-lg shadow dark:bg-cyan-800 sm:p-5">
            <h2 className="m-2">Dados salvos com sucesso!</h2>
        </div>
      </div>
    </div>
  );
}
