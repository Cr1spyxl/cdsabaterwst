<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">A little about you</p>
<div class="heading-row"><div><h1 class="page-heading">Your profile.</h1><p class="subtitle">The person behind the plans.</p></div></div>
<?php if ($user !== null): ?>
    <?php $initials = implode('', array_map(static fn ($part) => strtoupper(substr($part, 0, 1)), array_slice(explode(' ', trim($user['full_name'])), 0, 2))); ?>
    <section class="card profile-card"><div class="avatar"><?= esc($initials) ?></div><div><div class="profile-name"><?= esc($user['full_name']) ?></div><div class="profile-handle">@<?= esc($user['username']) ?></div></div></section>
    <div class="detail-grid"><div class="card detail"><div class="detail-label">Email address</div><div class="detail-value"><?= esc($user['email']) ?></div></div><div class="card detail"><div class="detail-label">Member since</div><div class="detail-value"><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></div></div></div>
<?php else: ?>
    <div class="card empty"><div class="empty-icon">◎</div><h2>No profile found</h2><p>Run the demo seeder to add the sample profile.</p></div>
<?php endif ?>
<?= $this->endSection() ?>
