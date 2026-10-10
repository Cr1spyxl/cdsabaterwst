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
}
