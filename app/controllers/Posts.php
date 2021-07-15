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
        $this->userModel = $this->model('User');
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

            array_push($data, 'created_at');

            $data['title'] = trim($_POST['title']);

            $data['body'] = trim($_POST['body']);

            $data['user_id'] = $_SESSION['id'];

            $this->validatePost($data);

        } else {
            $data = Posts::postData();

            $this->view('posts/add', $data);
        }
    }

    public function show($id)
    {
        $post = $this->postModel->getSinglePost($id);

        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    /**
     * Create Posts
     */
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = Posts::postData();

            $data['title'] = trim($_POST['title']);

            $data['body'] = trim($_POST['body']);

            $data['user_id'] = $_SESSION['id'];

            $data['id'] = $id;

            $this->validateUpdatePost($data);

        } else {

            $post = $this->postModel->getSinglePost($id);

            if($post->user_id != $_SESSION['id']){
                return redirect('posts');
            }

            $data = Posts::postData();

            $data['id'] = $id;

            $data['title'] = $post->title;

            $data['body'] = $post->body;

            $this->view('posts/edit', $data);
        }
    }

    /**
     * Delete Posts
     */
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->postModel->deletePost($id)){
                flash('post_message', 'Post deleted successfully');
                return redirect('posts');
            }
        }else{
            die('Oops! Something went wrong');
        }
    }

    /**
     * Validate Posts
     */
    public function validatePost($data)
    {
        if (empty($data['title'])) {
            $data['title_error'] = 'The title field is required';
        }

        if (empty($data['body'])) {
            $data['body_error'] = 'The body field is required';
        }

        if (empty($data['title_error']) && empty($data['body_error'])) {
            if($this->postModel->addPost($data)){
                flash('post_message', 'Post added successfully');

                return redirect('posts');
            }else{
                die('Oops! Something went wrong');
            }
        }else{
            $this->view('posts/add', $data);
        }
    }

   public function validateUpdatePost($data)
   {
       if (empty($data['title'])) {
           $data['title_error'] = 'The title field is required';
       }

       if (empty($data['body'])) {
           $data['body_error'] = 'The body field is required';
       }

       if (empty($data['title_error']) && empty($data['body_error'])) {
           if($this->postModel->updatePost($data)){
               flash('post_message', 'Post updated successfully');

               return redirect('posts');
           }else{
               die('Oops! Something went wrong');
           }
       }else{
           $this->view('posts/edit', $data);
       }
   }

    public static function postData()
    {
        $data = [
            'id' => '',
            'title' => '',
            'body' => '',
            'user_id' => '',
            'title_error' => '',
            'body_error' => '',
            'updated_at' => timestamps(),
            'created_at' => timestamps()
        ];

        return $data;
    }
}
