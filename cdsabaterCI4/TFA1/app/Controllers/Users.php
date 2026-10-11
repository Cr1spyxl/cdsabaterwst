<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $users = (new UserModel())->orderBy('id', 'ASC')->findAll();

        return view('users/index', ['users' => $users]);
    }

    public function new()
    {
        if ($this->request->getMethod() === 'POST') {
            if (! $this->validate(['username' => 'required|alpha_numeric_punct|min_length[3]|max_length[50]', 'full_name' => 'required|max_length[100]'])) {
                return view('users/form', ['title' => 'New User', 'user' => [], 'validation' => $this->validator]);
            }

            $model = new UserModel();
            $username = trim($this->request->getPost('username'));
            if ($model->where('username', $username)->first()) {
                return view('users/form', ['title' => 'New User', 'user' => [], 'formError' => 'That username is already in use.']);
            }

            $avatar = $this->prepareAvatar();
            if (isset($avatar['error'])) {
                return view('users/form', ['title' => 'New User', 'user' => [], 'formError' => $avatar['error']]);
            }

            $model->insert([
                'username' => $username,
                'full_name' => trim($this->request->getPost('full_name')),
                'avatar' => $avatar['filename'] ?? null,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/users')->with('message', 'User created.');
        }

        return view('users/form', ['title' => 'New User', 'user' => []]);
    }

    public function edit(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        if ($this->request->getMethod() === 'POST') {
            if (! $this->validate(['username' => 'required|alpha_numeric_punct|min_length[3]|max_length[50]', 'full_name' => 'required|max_length[100]'])) {
                return view('users/form', ['title' => 'Edit User', 'user' => $user, 'validation' => $this->validator]);
            }

            $username = trim($this->request->getPost('username'));
            $existing = $model->where('username', $username)->first();
            if ($existing && (int) $existing['id'] !== $id) {
                return view('users/form', ['title' => 'Edit User', 'user' => $user, 'formError' => 'That username is already in use.']);
            }

            $avatar = $this->prepareAvatar();
            if (isset($avatar['error'])) {
                return view('users/form', ['title' => 'Edit User', 'user' => $user, 'formError' => $avatar['error']]);
            }

            $data = ['username' => $username, 'full_name' => trim($this->request->getPost('full_name'))];
            if (isset($avatar['filename'])) {
                $data['avatar'] = $avatar['filename'];
            }
            $model->update($id, $data);

            if (isset($avatar['filename']) && ! empty($user['avatar'])) {
                $oldPath = FCPATH . 'uploads/avatars/' . basename($user['avatar']);
                if (is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }

            return redirect()->to('/users')->with('message', 'User updated.');
        }

        return view('users/form', ['title' => 'Edit User', 'user' => $user]);
    }

    private function prepareAvatar(): array
    {
        $file = $this->request->getFile('avatar');
        if (! $file || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return [];
        }
        if (! $file->isValid()) {
            return ['error' => 'Avatar upload failed. Please try again.'];
        }
        if ($file->getSize() > 2 * 1024 * 1024) {
            return ['error' => 'Avatar must be no larger than 2 MB.'];
        }
        if (! in_array($file->getMimeType(), ['image/jpeg', 'image/png'], true)) {
            return ['error' => 'Avatar must be a JPG or PNG image.'];
        }

        $directory = FCPATH . 'uploads/avatars';
        if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
            return ['error' => 'Avatar upload folder is unavailable.'];
        }

        $filename = $file->getRandomName();
        $destination = $directory . DIRECTORY_SEPARATOR . $filename;
        try {
            $file->move($directory, $filename);
            service('image')->withFile($destination)->fit(256, 256, 'center')->save($destination);
        } catch (\Throwable $e) {
            if (is_file($destination)) {
                @unlink($destination);
            }
            return ['error' => 'Avatar could not be prepared. Upload a valid JPG or PNG image.'];
        }

        return ['filename' => $filename];
    }
}
