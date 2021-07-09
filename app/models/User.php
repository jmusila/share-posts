<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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

        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}