<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin01', 'full_name' => 'Rhea Garcia', 'role' => 'Manager'],
            ['username' => 'cashier2', 'full_name' => 'Daniel Lee', 'role' => 'Cashier'],
            ['username' => 'stock3', 'full_name' => 'Maya Gomez', 'role' => 'Inventory'],
            ['username' => 'sales4', 'full_name' => 'Noah Smith', 'role' => 'Sales Associate'],
            ['username' => 'support5', 'full_name' => 'Ella Watson', 'role' => 'Support'],
        ];

        return view('users/index', ['users' => $users]);
    }
}
