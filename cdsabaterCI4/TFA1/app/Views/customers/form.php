<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | ChrisPOS</title>
    <style>
        body{margin:0;font-family:Arial,sans-serif;background:#f4f7fb;color:#1f2937}nav{background:#111827;padding:16px 24px}.nav-wrap,.container{max-width:900px;margin:auto}.nav-wrap{display:flex;justify-content:space-between;gap:20px;align-items:center}.brand,.nav-links a{color:#f9fafb;text-decoration:none}.brand{font-weight:bold;font-size:1.2rem}.nav-links{display:flex;gap:18px;flex-wrap:wrap}.container{padding:28px 20px 50px}.card{background:#fff;border-radius:16px;padding:24px;border:1px solid #e5e7eb;box-shadow:0 12px 30px #0f172a10}label{display:block;font-weight:600;margin:16px 0 6px}input{box-sizing:border-box;width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:8px;font:inherit}.actions{display:flex;gap:12px;margin-top:22px}button,.button{border:0;border-radius:8px;background:#2563eb;color:white;padding:11px 16px;font:inherit;text-decoration:none;cursor:pointer}.button.secondary{background:#64748b}.error{color:#b91c1c}.errors{background:#fef2f2;padding:12px;border-radius:8px}
    </style>
</head>
<body>
<nav><div class="nav-wrap"><a class="brand" href="<?= base_url('/') ?>">ChrisPOS</a><div class="nav-links"><a href="<?= base_url('customers') ?>">Customer Accounts</a><a href="<?= base_url('users') ?>">User Accounts</a></div></div></nav>
<main class="container"><section class="card">
    <h1><?= esc($title) ?></h1>
    <?php if (isset($validation)): ?><div class="errors"><ul><?php foreach ($validation->getErrors() as $error): ?><li class="error"><?= esc($error) ?></li><?php endforeach ?></ul></div><?php endif ?>
    <form method="post">
        <?= csrf_field() ?>
        <label for="full_name">Full name *</label>
        <input id="full_name" name="full_name" maxlength="100" required value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>">
        <label for="email">Email *</label>
        <input id="email" name="email" type="email" maxlength="100" required value="<?= esc(old('email', $customer['email'] ?? '')) ?>">
        <label for="phone">Phone</label>
        <input id="phone" name="phone" maxlength="20" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>">
        <div class="actions"><button type="submit">Save customer</button><a class="button secondary" href="<?= base_url('customers') ?>">Cancel</a></div>
    </form>
</section></main>
</body>
</html>
