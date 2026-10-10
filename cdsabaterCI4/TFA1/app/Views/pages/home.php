<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Landing</title>
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
            padding: 24px;
        }

        nav {
            background: #111827;
            padding: 16px 24px;
            box-shadow: 0 2px 8px rgba(17, 24, 39, 0.15);
        }

        nav .nav-wrap {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            color: #f9fafb;
            font-size: 1.25rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #d1d5db;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .nav-links a:hover {
            color: #ffffff;
        }

        .hero {
            margin-top: 30px;
            background: linear-gradient(135deg, #ffffff 0%, #eef3ff 100%);
            border: 1px solid #dde7ff;
            border-radius: 18px;
            padding: 48px 36px;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.06);
        }

        .hero h1 {
            margin: 0 0 12px;
            font-size: 2.5rem;
            color: #0f172a;
        }

        .hero p {
            margin: 0 0 24px;
            font-size: 1.05rem;
            line-height: 1.7;
            color: #4b5563;
            max-width: 680px;
        }

        .btn-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn.primary {
            background: #2563eb;
            color: #fff;
        }

        .btn.secondary {
            background: #e2e8f0;
            color: #0f172a;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 28px;
        }

        .stat {
            background: white;
            border-radius: 14px;
            padding: 22px 20px;
            border: 1px solid #e5e7eb;
        }

        .stat strong {
            display: block;
            font-size: 1.7rem;
            margin-bottom: 6px;
            color: #111827;
        }

        .stat span {
            color: #6b7280;
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
        <section class="hero">
            <h1>Welcome to ChrisPOS</h1>
            <p>
                A simple and modern point-of-sale dashboard for managing daily sales,
                customer information, and staff accounts in one place.
            </p>
            <div class="btn-row">
                <a class="btn primary" href="<?= base_url('customers') ?>">View Customers</a>
                <a class="btn secondary" href="<?= base_url('users') ?>">View Users</a>
            </div>
        </section>

        <section class="stats">
            <div class="stat">
                <strong>120</strong>
                <span>Daily Transactions</span>
            </div>
            <div class="stat">
                <strong>45</strong>
                <span>Active Customers</span>
            </div>
            <div class="stat">
                <strong>12</strong>
                <span>Staff Members</span>
            </div>
            <div class="stat">
                <strong>94%</strong>
                <span>Sales Efficiency</span>
            </div>
        </section>
    </div>
</body>
</html>
