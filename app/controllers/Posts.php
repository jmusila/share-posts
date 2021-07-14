<?php

class Posts extends Controller
{
    /**
     * Instantiate class
     */
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    /**
     * Index method to get all posts
     */
    public function index()
    {
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }
    /**
     * Create Posts
     */
    public function add()
    {
        $data = $this->postData();

        $this->view('posts/add', $data);
    }

    public function postData()
    {
        $data = [
            'title' => '',
            'body' => '',
            'created_at' => date('Y-m-d h:i:s', time()),
            'updated_at' => date('Y-m-d h:i:s', time())
        ];

        return $data;
    }
}
