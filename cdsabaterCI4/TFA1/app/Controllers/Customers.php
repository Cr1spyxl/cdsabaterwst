<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Aaliyah Reyes', 'email' => 'aaliyah.reyes@example.com', 'phone' => '0917-123-4567'],
            ['full_name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0928-765-4321'],
            ['full_name' => 'Nina Dela Cruz', 'email' => 'nina.delacruz@example.com', 'phone' => '0932-555-9988'],
            ['full_name' => 'Julian Cruz', 'email' => 'julian.cruz@example.com', 'phone' => '0945-222-3344'],
            ['full_name' => 'Sophia Tan', 'email' => 'sophia.tan@example.com', 'phone' => '0955-987-1122'],
        ];

        return view('customers/index', ['customers' => $customers]);
    }
}
