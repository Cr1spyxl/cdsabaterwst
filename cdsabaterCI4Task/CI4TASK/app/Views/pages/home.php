<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow"><?= esc(date('l, F j', strtotime($today))) ?></p>
<div class="heading-row"><div><h1 class="page-heading">A fresh start.</h1><p class="subtitle">Here&apos;s what you have on your plate today.</p></div><span class="count-label"><?= count($tasks) ?> <?= count($tasks) === 1 ? 'task' : 'tasks' ?> today</span></div>
<?php if ($message = session()->getFlashdata('success')): ?><div class="notice success" role="status"><?= esc($message) ?></div><?php endif ?>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<section class="card add-card" aria-label="Add a task">
    <form class="add-form" action="<?= site_url('tasks/create') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="return_to" value="today">
        <input class="title-input" type="text" name="title" maxlength="150" placeholder="What would you like to get done?" value="<?= esc(old('title') ?? '') ?>" required aria-label="Task title">
        <input type="hidden" name="task_date" value="<?= esc($today) ?>">
        <button class="primary-button" type="submit">+ Add task</button>
    </form>
    <?php if (isset($errors['title'])): ?><div class="field-error"><?= esc($errors['title']) ?></div><?php endif ?>
</section>
<div class="stats">
    <div class="card stat"><div class="stat-label">On your list</div><div class="stat-value"><?= count($tasks) ?></div></div>
    <div class="card stat"><div class="stat-label">Completed</div><div class="stat-value"><?= count(array_filter($tasks, static fn ($task) => strtolower($task['status']) === 'completed')) ?></div></div>
    <div class="card stat"><div class="stat-label">Still to do</div><div class="stat-value"><?= count(array_filter($tasks, static fn ($task) => strtolower($task['status']) !== 'completed')) ?></div></div>
</div>
<h2 class="section-title">Today&apos;s focus</h2>
<div class="card task-list">
    <?php if ($tasks === []): ?>
        <div class="empty"><div class="empty-icon">&#9728;</div><h2>A clear day ahead</h2><p>You don&apos;t have any tasks scheduled for today.</p></div>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <?php $statusClass = strtolower(str_replace(' ', '-', $task['status'])); $isComplete = strtolower($task['status']) === 'completed'; ?>
            <div class="task-row with-actions">
                <span class="check <?= $isComplete ? 'done' : '' ?>"><?= $isComplete ? '&#10003;' : '' ?></span>
                <div><div class="task-title"><?= esc($task['title']) ?></div><div class="task-date">Added <?= esc(date('g:i A', strtotime($task['created_at']))) ?></div></div>
                <span class="status status-<?= esc($statusClass) ?>"><?= esc($task['status']) ?></span>
                <div class="task-actions">
                    <form action="<?= site_url('tasks/' . $task['id'] . '/toggle') ?>" method="post">
                        <?= csrf_field() ?><input type="hidden" name="return_to" value="today">
                        <button class="action-button" type="submit"><?= $isComplete ? 'Reopen' : 'Complete' ?></button>
                    </form>
                    <form action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>" method="post" onsubmit="return confirm('Delete this task?')">
                        <?= csrf_field() ?><input type="hidden" name="return_to" value="today">
                        <button class="action-button delete" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>
<?= $this->endSection() ?>
