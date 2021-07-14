<?php

class Posts extends Controller
{
    /**
     * Index method to get all posts
     */
    public function index()
    {
        $this->view('posts/index');
    }
}