<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class LikeController
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function store(Request $request)
    {
        die(var_dump($request->get('id')));

        // die(var_dump($this->get_client_ip()));

        // $sql = "SELECT posts.*, count(likes.id) AS numberOfLikes
        //         FROM posts
        //         LEFT JOIN likes
        //         ON posts.id = likes.post_id
        //         group by posts.id
        //         order by created_at desc";
        //
        // $posts = $this->app['db']->prepare($sql);
        // $posts->execute();
        // $posts = $posts->fetchAll(\PDO::FETCH_CLASS, \App\Models\Post::class);
        //
        // return $this->app['twig']->render('index.twig', compact('posts'));
    }

    //TODO get client ip refactor
    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = '127.0.0.1';
        return $ipaddress;
    }

}
