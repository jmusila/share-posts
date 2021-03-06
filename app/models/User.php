<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Register User
     */
    public function register($data)
    {
        $this->db->query(
            'INSERT INTO users (name, email, password, created_at, updated_at) VALUES(:name, :email, :password, :created_at, :updated_at)'
        );

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':created_at', $data['created_at']);
        $this->db->bind(':updated_at', $data['updated_at']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Find user by email
     */
    public function findUserByEmail($email)
    {
        $this->db->query(
            'SELECT * FROM users where email = :email'
        );

        $this->db->bind(':email', $email);

        $user = Database::first();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Login user
     *
     */
    public function login($email, $password)
    {
        $this->db->query(
            'SELECT * FROM users WHERE email = :email'
        );

        $this->db->bind(':email', $email);

        $user = Database::first();

        $hashed_password = $user->password;

        if (password_verify($password, $hashed_password)) {
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Find user by id
     */
    public function getUserById($id)
    {
        $this->db->query(
            'SELECT * FROM users where id = :id'
        );

        $this->db->bind(':id', $id);

        $user = Database::first();

        return $user;
    }
}
