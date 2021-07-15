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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = Posts::postData();

            $data['title'] = trim($data['title']);

            $data['body'] = trim($data['body']);

            $data['user_id'] = $_SESSION['id'];



        } else {
            $data = Posts::postData();

            $this->view('posts/add', $data);
        }
    }

    public static function postData()
    {
        $data = [
            'title' => '',
            'body' => '',
            'user_id' => '',
            'title_error' => '',
            'body_error' => '',
            'created_at' => date('Y-m-d h:i:s', time()),
            'updated_at' => date('Y-m-d h:i:s', time())
        ];

        return $data;
    }
}
