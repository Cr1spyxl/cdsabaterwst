<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About ChrisPOS</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 32px 24px 60px;
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
            padding: 32px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        h1 {
            margin-top: 0;
            color: #0f172a;
        }

        p {
            color: #4b5563;
            line-height: 1.8;
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
            <h1>About ChrisPOS</h1>
            <p>
                ChrisPOS is a lightweight point-of-sale system created for small retail shops,
                convenience stores, and service counters that need fast and organized daily operations.
            </p>
            <p>
                The system is designed to help staff manage customer records, user accounts,
                and transaction-focused workflows in a simple interface that is easy to use and maintain.
            </p>
            <p>
                This early version focuses on the front-end structure and account management pages,
                using static arrays as temporary sample data before database integration is added.
            </p>
        </div>
    </div>
</body>
</html>
