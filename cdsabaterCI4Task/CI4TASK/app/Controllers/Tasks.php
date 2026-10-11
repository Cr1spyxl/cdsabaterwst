<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\I18n\Time;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())
            ->orderBy('task_date', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->findAll();

        return view('pages/tasks', [
            'tasks' => $tasks,
            'today' => Time::now('Asia/Manila')->toDateString(),
            'pageTitle' => 'All tasks',
            'activePage' => 'tasks',
        ]);
    }

    public function create()
    {
        if (! $this->validate([
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert([
            'title' => trim((string) $this->request->getPost('title')),
            'status' => 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => Time::now('Asia/Manila')->toDateTimeString(),
        ]);

        return $this->returnToTaskPage()->with('success', 'Task added to your list.');
    }

    public function toggle(int $id)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if ($task === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Task not found.');
        }

        $isComplete = strtolower($task['status']) === 'completed';
        $model->update($id, ['status' => $isComplete ? 'pending' : 'completed']);

        return $this->returnToTaskPage()->with('success', $isComplete ? 'Task moved back to pending.' : 'Task marked complete.');
    }

    public function delete(int $id)
    {
        $model = new TaskModel();

        if ($model->find($id) === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Task not found.');
        }

        $model->delete($id);

        return $this->returnToTaskPage()->with('success', 'Task deleted.');
    }

    private function returnToTaskPage()
    {
        return redirect()->to($this->request->getPost('return_to') === 'today' ? site_url('/') : site_url('tasks'));
    }
}
