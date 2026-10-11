<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">Your plans, in one place</p>
<div class="heading-row"><div><h1 class="page-heading">All tasks.</h1><p class="subtitle">A little progress, one thing at a time.</p></div><span class="count-label"><?= count($tasks) ?> <?= count($tasks) === 1 ? 'task' : 'tasks' ?> total</span></div>
<?php if ($message = session()->getFlashdata('success')): ?><div class="notice success" role="status"><?= esc($message) ?></div><?php endif ?>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<section class="card add-card" aria-label="Add a task">
    <form class="add-form" action="<?= site_url('tasks/create') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="return_to" value="tasks">
        <input class="title-input" type="text" name="title" maxlength="150" placeholder="What would you like to get done?" value="<?= esc(old('title') ?? '') ?>" required aria-label="Task title">
        <input type="date" name="task_date" value="<?= esc(old('task_date', $today)) ?>" required aria-label="Task date">
        <button class="primary-button" type="submit">+ Add task</button>
    </form>
    <?php if (isset($errors['title'])): ?><div class="field-error"><?= esc($errors['title']) ?></div><?php endif ?>
    <?php if (isset($errors['task_date'])): ?><div class="field-error"><?= esc($errors['task_date']) ?></div><?php endif ?>
</section>
<div class="card task-list">
    <?php if ($tasks === []): ?>
        <div class="empty"><div class="empty-icon">&#9776;</div><h2>Your list is open</h2><p>There are no tasks to show yet.</p></div>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <?php $statusClass = strtolower(str_replace(' ', '-', $task['status'])); $isComplete = strtolower($task['status']) === 'completed'; ?>
            <div class="task-row with-actions">
                <span class="check <?= $isComplete ? 'done' : '' ?>"><?= $isComplete ? '&#10003;' : '' ?></span>
                <div><div class="task-title"><?= esc($task['title']) ?></div><div class="task-date"><?= esc(date('M j, Y', strtotime($task['task_date']))) ?> <span style="padding:0 4px">&middot;</span> added <?= esc(date('g:i A', strtotime($task['created_at']))) ?></div></div>
                <span class="status status-<?= esc($statusClass) ?>"><?= esc($task['status']) ?></span>
                <div class="task-actions">
                    <form action="<?= site_url('tasks/' . $task['id'] . '/toggle') ?>" method="post">
                        <?= csrf_field() ?><input type="hidden" name="return_to" value="tasks">
                        <button class="action-button" type="submit"><?= $isComplete ? 'Reopen' : 'Complete' ?></button>
                    </form>
                    <form action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>" method="post" onsubmit="return confirm('Delete this task?')">
                        <?= csrf_field() ?><input type="hidden" name="return_to" value="tasks">
                        <button class="action-button delete" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>
<?= $this->endSection() ?>
