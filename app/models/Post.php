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

    public function addPost($data)
    {
        $this->db->query(
            'INSERT INTO posts (title, body, user_id, created_at, updated_at) VALUES(:title, :body, :user_id, :created_at, :updated_at)'
        );

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':created_at', $data['created_at']);
        $this->db->bind(':updated_at', $data['updated_at']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updatePost($data)
    {
        $this->db->query(
            'UPDATE posts SET title = :title, body = :body, updated_at = :updated_at WHERE id = :id'
        );

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':updated_at', $data['updated_at']);
        $this->db->bind(':id', $data['id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getSinglePost($id)
    {
        $this->db->query(
            'SELECT * FROM posts WHERE id = :id'
        );

        $this->db->bind(':id', $id);

        $post = Database::first();

        return $post;
    }
}
