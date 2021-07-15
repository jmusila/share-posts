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

            $data['title'] = trim($_POST['title']);

            $data['body'] = trim($_POST['body']);

            $data['user_id'] = $_SESSION['id'];

            $this->validatePost($data);

        } else {
            $data = Posts::postData();

            $this->view('posts/add', $data);
        }
    }

    /**
     * Validate Posts
     */
    public function validatePost($data)
    {
        if (empty($data['title_error'])) {
            $data['title_error'] = 'The title field is required';
        }

        if (empty($data['body_error'])) {
            $data['body_error'] = 'The body field is required';
        }

        if (empty($data['title_error']) && empty($data['body_error'])) {
            die('SUCCESS');
        }else{
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
