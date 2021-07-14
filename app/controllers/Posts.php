<?php

class Posts extends Controller
{
    /**
     * Instantiate class
     */
    public function __construct()
    {
        if(!isset($_SESSION['id'])){
            redirect('users/login');
        }
    }

    /**
     * Index method to get all posts
     */
    public function index()
    {
        $data = [];

        $this->view('posts/index', $data);
    }
}