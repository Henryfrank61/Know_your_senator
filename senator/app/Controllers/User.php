<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\Shared;

class User extends BaseController
{
    private $userModel, $shared;

    public function __construct()
    {
        helper(['url']);

        $this->userModel = new UserModel();
        $this->shared = new Shared();
    }


    public function register()
    {
        if($this->shared->isLoggedIn())
        {
            return redirect()->to(base_url(''));
        }

        helper(['form']);
        $userModel = $this->userModel;

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[4]|max_length[255]',
                'confirmPassword' => 'required|matches[password]',
                'email' => 'required|valid_email'
            ];

            if ($this->validate($rules)) {
                $data = [
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'email' => $this->request->getVar('email')
                ];

                $userModel->save($data);
                session()->setFlashdata('success', 'Registration Successful');
                return redirect()->to('/login');
            } else {
                // Store the validation errors in flashdata
                session()->setFlashdata('error', $this->validator->listErrors());
            }
        }

        $data["title"] = "Register";

        return view('register', $data);
    }

    public function login()
    {
        if($this->shared->isLoggedIn())
        {
            return redirect()->to(base_url(''));
        }

        helper(['form']);
        $userModel = $this->userModel;

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'email' => 'required|min_length[3]',
                'password' => 'required|min_length[4]|max_length[255]',
            ];

            if ($this->validate($rules)) {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $user = $userModel->login($email, $password);

                if ($user) {
                    $session = session();
                    $session->set('user_email', $user['email']);
                    $session->set('user_id', $user['id']);
                    $session->set('isAdmin', isset($user['isAdmin']) ? $user["isAdmin"] : 0);
                    return redirect()->to(base_url('managePost'));
                } else {
                    session()->setFlashdata('error', 'Invalid login credentials');
                    return redirect()->to(base_url('login'));
                }
            }

            session()->setFlashdata('error', $this->validator->listErrors());
        }

        $data["title"] = "Login";

        return view('login', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function profile($user_id)
    {
        $isLoggedIn = $this->shared->isLoggedIn();
        if (!$isLoggedIn) {
            // redirects to login if user is not logged in
            return redirect()->route('login');
        }
        $data["isLoggedIn"] = $isLoggedIn;

        $userModel = $this->userModel;
        $data['user'] = $userModel->find($user_id);

        if (!isset($data['user'])) {
            return redirect()->to(base_url('post'));
        }

        $data["title"] = "Profile";

        return view('profile', $data);
    }

    public function profileUpdate($id)
    {
        helper(['form']);
        $userModel = $this->userModel;

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required',
                'email' => 'required'
            ];


            // validation
            if ($this->validate($rules)) {
                $updatedData = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email')
                ];

                // checks if password is set
                if ($this->request->getVar('password')) {
                    $updatedData['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                }

                // Update the user in the database
                if ($userModel->update($id, $updatedData)) {
                    session()->setFlashdata('success', 'User updated successfully.');
                    return redirect()->to(base_url('profile/' . $id));
                }

                session()->setFlashdata('error', 'Unable to update User.');
                return redirect()->to(base_url('profile/' . $id));
            }

            $validation = \Config\Services::validation();
            session()->setFlashdata('validation_errors', $validation->getErrors());

        }

        return redirect()->to(base_url('profile/' . $id));
    }

    public function isLoggedIn()
    {
        // Get the user's email from session
        $email = session()->get('user_email');

        // Check if the session contains user email
        if ($email !== null) {
            // get the user from the database based on the email
            $userModel = $this->userModel;
            $user = $userModel->where('email', $email)->first();

            if ($user) {
                return $user;
            }
        }

        // If user is not found in the database or session doesn't contain user email, return false
        return false;
    }


}
