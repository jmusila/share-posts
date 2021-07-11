<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = Users::userData();

            $data['name'] = trim($_POST['name']);

            $data['email'] = trim($_POST['email']);

            $data['password'] = trim($_POST['password']);

            $data['confirm_password'] = trim($_POST['confirm_password']);

            $this->validateUserRegistration($data);
        } else {
            $data = Users::userData();

            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = Users::userData();

            $data['email'] = trim($_POST['email']);

            $data['password'] = trim($_POST['password']);

            $this->validateLogin($data);
        } else {
            $data = Users::userData();

            $this->view('users/login', $data);
        }
    }

    /**
     * Validate User
     */
    public function validateUserRegistration($data)
    {
        if (empty($data['name'])) {
            $data['name_error'] = 'The name field is required.';
        }

        if (empty($data['email'])) {
            $data['email_error'] = 'The email field is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please enter a valid email address.';
        } elseif ($this->userModel->findUserByEmail($data['email'])) {
            $data['email_error'] = 'Email is already taken.';
        }

        if (empty($data['password'])) {
            $data['password_error'] = 'The password field is required.';
        } elseif (strlen($data['password']) < 6) {
            $data['password_error'] = 'The password must be atleast 6 characters.';
        }

        if (empty($data['confirm_password'])) {
            $data['confirm_password_error'] = 'Please confirm password';
        } else {
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_error'] = 'Passwords do not match.';
            }
        }

        if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
            
            // Hash the password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if($this->userModel->register($data)){
                return redirect('users/login');
            }else{
                die('Opps! Something went wrong');
            }
        } else {
            $this->view('users/register', $data);
        }
    }

    public function validateLogin($data)
    {
        if (empty($data['email'])) {
            $data['email_error'] = 'The email field is required.';
        }

        if (empty($data['password'])) {
            $data['password_error'] = 'The password field is required.';
        } elseif (strlen($data['password']) < 6) {
            $data['password_error'] = 'The password must be atleast 6 characters.';
        }

        if (empty($data['email_error']) && empty($data['password_error'])) {
            die('Success');
        } else {
            $this->view('users/login', $data);
        }
    }

    public static function userData()
    {
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

        return $data;
    }
}
