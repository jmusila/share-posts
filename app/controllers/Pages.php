<?php

class Pages extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple Social Network buil on the Custom Made PHP Framework.'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Abouts Us'
        ];

        $this->view('pages/about', $data);
    }
}
