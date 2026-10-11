<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index(): string
    {
        return view('pages/profile', [
            'user' => (new UserModel())->orderBy('id', 'ASC')->first(),
            'pageTitle' => 'Profile',
            'activePage' => 'profile',
        ]);
    }
}
