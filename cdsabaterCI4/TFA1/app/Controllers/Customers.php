<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = (new CustomerModel())->orderBy('id', 'ASC')->findAll();

        return view('customers/index', ['customers' => $customers]);
    }

    public function new()
    {
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'full_name' => 'required|max_length[100]',
                'email' => 'required|valid_email|max_length[100]',
                'phone' => 'permit_empty|max_length[20]',
            ];

            if (! $this->validate($rules)) {
                return view('customers/form', ['title' => 'New Customer', 'customer' => [], 'validation' => $this->validator]);
            }

            (new CustomerModel())->insert([
                'full_name' => trim($this->request->getPost('full_name')),
                'email' => trim($this->request->getPost('email')),
                'phone' => trim((string) $this->request->getPost('phone')) ?: null,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/customers')->with('message', 'Customer created.');
        }

        return view('customers/form', ['title' => 'New Customer', 'customer' => []]);
    }

    public function edit(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);
        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'full_name' => 'required|max_length[100]',
                'email' => 'required|valid_email|max_length[100]',
                'phone' => 'permit_empty|max_length[20]',
            ];
            if (! $this->validate($rules)) {
                return view('customers/form', ['title' => 'Edit Customer', 'customer' => $customer, 'validation' => $this->validator]);
            }

            $model->update($id, [
                'full_name' => trim($this->request->getPost('full_name')),
                'email' => trim($this->request->getPost('email')),
                'phone' => trim((string) $this->request->getPost('phone')) ?: null,
            ]);

            return redirect()->to('/customers')->with('message', 'Customer updated.');
        }

        return view('customers/form', ['title' => 'Edit Customer', 'customer' => $customer]);
    }
}
