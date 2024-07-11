import React, { useState } from 'react';
import { router, usePage } from '@inertiajs/react';

const AddContactForm = () => {
    const { success } = usePage().props;

    const [formData, setFormData] = useState({
        name: '',
        last_name: '',
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prev) => ({
            ...prev,
            [name]: value,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        router.post('/contacts', formData);
    };

    return (
        <><div className="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
            {success && (
                <div className="alert alert-success" role="alert">
                    {success}
                </div>
            )}
            <h1>Add Contact</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Name:</label>
                    <input className="bg-gray-900"
                        type="text"
                        name="name"
                        value={formData.name}
                        onChange={handleChange} />
                </div>
                <div>
                    <label>Last Name:</label>
                    <input className="bg-gray-900"
                        type="text"
                        name="last_name"
                        value={formData.last_name}
                        onChange={handleChange} />
                </div>
                <button type="submit">Add Contact</button>
            </form>
        </div></>
    );
};

export default AddContactForm;
