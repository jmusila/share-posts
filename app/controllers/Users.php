<?php

class Users extends Controller
{
    public function __construct()
    {
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            $this->validateUser($data);
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];

            //Load view
            $this->view('users/login', $data);
        }
    }

    /**
     * Validate User
     */
    public function validateUser($data)
    {
        if (empty($data['name'])) {
            $data['name_error'] = 'The name field is required.';
        }

        if (empty($data['email'])) {
            $data['email_error'] = 'The email field is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please enter a valid email address.';
        }

        if (empty($data['password'])) {
            $data['password_error'] = 'The password field is required.';
        } elseif (strlen($data['password']) < 6) {
            $data['password_error'] = 'The password must be atleast 6 characters.';
        }

        if (empty($data['confirm_password'])) {
            $data['confirm_password_error'] = 'The confirm password field is required.';
        } else {
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_error'] = 'Passwords do not match.';
            }
        }

        if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
            die('Success');
        } else {
            $this->view('users/register', $data);
        }
    }
}
