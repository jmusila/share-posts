<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query(
            'SELECT *,
            posts.id as post_id,
            users.id as user_id,
            posts.created_at as date_created,
            users.created_at as user_created
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.id
            ORDER BY posts.created_at DESC
        ');

        $posts = Database::all();

        return $posts;
    }
}
