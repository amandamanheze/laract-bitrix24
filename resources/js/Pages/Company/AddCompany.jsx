import React, { useState } from 'react';
import { Head, router } from '@inertiajs/react';
import TextInput from '@/Components/TextInput';
import InputLabel from '@/Components/InputLabel';
import Header from '@/Components/Header';
import ConfirmationModal from '@/Components/ConfirmationModal';

export default function AddCompany() {
  const [values, setValues] = useState({
    title: "",
    email: "",
    contacts: [
      { name: "", last_name: "" },
      { name: "", last_name: "" }
    ]
  });

  const [errors, setErrors] = useState({});
  const [showModal, setShowModal] = useState(false);

  function handleChange(e) {
    const { name, value } = e.target;
    setValues(prevValues => ({
      ...prevValues,
      [name]: value
    }));
  }

  async function handleSubmit(e) {
    e.preventDefault();

    setErrors({});

    if (!values.title) {
      setErrors(prevErrors => ({
        ...prevErrors,
        title: "O nome da empresa é obrigatório."
      }));
      return;
    }

    try {
      await router.post('/companies', {
        title: values.title,
        email: values.email,
        contacts: values.contacts.filter(contact => contact.name || contact.last_name)
      });

      setShowModal(true);
    } catch (error) {
      console.error(error);
      alert('Houve um erro ao criar a empresa.');
    }
  }

  function handleContactChange(index, e) {
    const { name, value } = e.target;
    setValues(prevValues => ({
      ...prevValues,
      contacts: prevValues.contacts.map((contact, i) => i === index ? { ...contact, [name]: value } : contact)
    }));
  }

  function addContact() {
    setValues(prevValues => ({
      ...prevValues,
      contacts: [...prevValues.contacts, { name: "", last_name: "" }]
    }));
  }

  function handleCloseModal() {
    setShowModal(false);
  }

  return (
    <>
      <Head title="Cadastrar empresa" />
      <div className="dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none shadow-md">
        <div className="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
          <Header />
          <div className="w-full max-w-4xl p-8 bg-white dark:text-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none shadow-md">
            <h1 className="text-xl mb-6 text-center font-mono">CADASTRAR EMPRESA</h1>
            <form onSubmit={handleSubmit} className="w-1/2 mx-auto">
              <InputLabel htmlFor="title" value="Nome da empresa" />
              <TextInput
                id="title"
                name="title"
                value={values.title}
                onChange={handleChange}
                isFocused={true}
                className="mt-1 block w-full mb-3"
              />
              {errors.title && <div className="text-red-500 text-sm -mt-1 mb-2">{errors.title}</div>}

              <InputLabel htmlFor="email" value="Email da empresa" />
              <TextInput
                id="email"
                type="email"
                name="email"
                value={values.email}
                className="mt-2 block w-full mb-3"
                onChange={handleChange}
              />

              {values.contacts.map((contact, index) => (
                <div key={index}>
                  <InputLabel htmlFor={`${index + 1}name`} value={`Nome do contato ${index + 1}`} />
                  <TextInput
                    id={`${index + 1}name`}
                    name="name"
                    value={contact.name}
                    onChange={e => handleContactChange(index, e)}
                    className="mt-2 block w-full mb-3"
                  />

                  <InputLabel htmlFor={`${index + 1}last_name`} value={`Sobrenome do contato ${index + 1}`} />
                  <TextInput
                    id={`${index + 1}last_name`}
                    name="last_name"
                    value={contact.last_name}
                    onChange={e => handleContactChange(index, e)}
                    className="mt-2 block w-full mb-5"
                  />
                </div>
              ))}

              <button type="button" onClick={addContact} className="mb-5 text-sm text-gray-500 hover:text-gray-700">
                Adicionar outro contato
              </button>

              <div className="flex space-x-2">
                <button
                  type="button"
                  onClick={() => window.history.back()}
                  className="flex-1 bg-gray-500 text-white rounded mb-4"
                >
                  Voltar
                </button>
                <button type="submit" className="flex-1 bg-cyan-500 text-white px-4 py-2 rounded mb-4">
                  Salvar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <ConfirmationModal show={showModal} onClose={handleCloseModal} />
    </>
  );
}
