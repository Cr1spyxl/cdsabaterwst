<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $today = Time::now('Asia/Manila')->toDateString();
        $now = Time::now('Asia/Manila')->toDateTimeString();

        if ($this->db->table('users')->countAllResults() === 0) {
            $this->db->table('users')->insert([
                'username' => 'cdsabater',
                'full_name' => 'CD Sabater',
                'email' => 'cdsabater@example.com',
                'created_at' => $now,
            ]);
        }

        if ($this->db->table('tasks')->countAllResults() === 0) {
            $this->db->table('tasks')->insertBatch([
                ['title' => 'Review project requirements', 'status' => 'completed', 'task_date' => $today, 'created_at' => $now],
                ['title' => 'Plan the day and set priorities', 'status' => 'in progress', 'task_date' => $today, 'created_at' => $now],
                ['title' => 'Build the task list page', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
                ['title' => 'Read the database documentation', 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime($today . ' -1 day')), 'created_at' => $now],
                ['title' => 'Sketch the profile page', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime($today . ' -1 day')), 'created_at' => $now],
                ['title' => 'Organize class notes', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime($today . ' -2 days')), 'created_at' => $now],
                ['title' => 'Prepare a weekly study plan', 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime($today . ' -3 days')), 'created_at' => $now],
                ['title' => 'Back up project files', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime($today . ' -3 days')), 'created_at' => $now],
            ]);
        }
    }
}
