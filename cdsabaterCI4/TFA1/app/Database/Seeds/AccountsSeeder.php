<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AccountsSeeder extends Seeder
{
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Aaliyah Reyes', 'email' => 'aaliyah.reyes@example.com', 'phone' => '0917-123-4567', 'created_at' => $createdAt],
            ['full_name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0928-765-4321', 'created_at' => $createdAt],
            ['full_name' => 'Nina Dela Cruz', 'email' => 'nina.delacruz@example.com', 'phone' => '0932-555-9988', 'created_at' => $createdAt],
            ['full_name' => 'Julian Cruz', 'email' => 'julian.cruz@example.com', 'phone' => '0945-222-3344', 'created_at' => $createdAt],
            ['full_name' => 'Sophia Tan', 'email' => 'sophia.tan@example.com', 'phone' => '0955-987-1122', 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insertBatch([
            ['username' => 'admin01', 'full_name' => 'Rhea Garcia', 'created_at' => $createdAt],
            ['username' => 'cashier2', 'full_name' => 'Daniel Lee', 'created_at' => $createdAt],
            ['username' => 'stock3', 'full_name' => 'Maya Gomez', 'created_at' => $createdAt],
            ['username' => 'sales4', 'full_name' => 'Noah Smith', 'created_at' => $createdAt],
            ['username' => 'support5', 'full_name' => 'Ella Watson', 'created_at' => $createdAt],
        ]);
    }
}
