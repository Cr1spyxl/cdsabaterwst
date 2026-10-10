<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 28px 20px 50px;
        }

        nav {
            background: #111827;
            padding: 16px 24px;
        }

        .nav-wrap {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            color: #f9fafb;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .nav-links {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #d1d5db;
            text-decoration: none;
        }

        .nav-links a:hover {
            color: white;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        h1 {
            margin-top: 0;
            color: #0f172a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        tbody tr:hover {
            background: #f8fafc;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-wrap">
            <a class="brand" href="<?= base_url('/') ?>">ChrisPOS</a>
            <div class="nav-links">
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('about') ?>">About</a>
                <a href="<?= base_url('customers') ?>">Customer Accounts</a>
                <a href="<?= base_url('users') ?>">User Accounts</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h1>User Accounts</h1>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['full_name']) ?></td>
                            <td><?= esc($user['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
