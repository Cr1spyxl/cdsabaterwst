<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index(): string
    {
        $today = Time::now('Asia/Manila')->toDateString();
        $tasks = (new TaskModel())
            ->where('task_date', $today)
            ->orderBy('created_at', 'ASC')
            ->findAll();

        return view('pages/home', [
            'tasks' => $tasks,
            'today' => $today,
            'pageTitle' => 'Today',
            'activePage' => 'home',
        ]);
    }
}
