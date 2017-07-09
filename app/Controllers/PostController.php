<?php

namespace App\Controllers;

class PostController
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index()
    {
        $sql = "SELECT posts.*, count(likes.id) AS numberOfLikes
                FROM posts
                LEFT JOIN likes
                ON posts.id = likes.post_id
                group by posts.id
                order by created_at desc";

        $posts = $this->app['db']->prepare($sql);
        $posts->execute();
        $posts = $posts->fetchAll(\PDO::FETCH_CLASS, \App\Models\Post::class);

        return $this->app['twig']->render('index.twig', compact('posts'));
    }

    public function create()
    {
        return $this->app['twig']->render('create.twig');
    }

    public function store()
    {
        return 'store';
    }

    public function show($id)
    {
        $post = $this->app['db']->prepare("SELECT * FROM posts WHERE id = {$id}");
        $post->execute();
        $post = $post->fetchAll(\PDO::FETCH_CLASS, \App\Models\Post::class);

        $likes = $this->app['db']->prepare("SELECT COUNT(*) FROM likes WHERE post_id = {$id}");
        $likes->execute();
        $likes = $likes->fetchColumn();

        return $this->app['twig']->render('show.twig', compact('post', 'likes'));
    }
}
