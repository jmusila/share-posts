<?php

class Posts extends Controller
{
    /**
     * Index method to get all posts
     */
    public function index()
    {
        $data = [];

        $this->view('posts/index', $data);
    }
}