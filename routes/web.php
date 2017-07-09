<?php

$app->get('/posts', 'post.controller:index');
$app->get('/posts/create', 'post.controller:create');
$app->post('/posts', 'post.controller:store');
$app->get('/posts/{id}', 'post.controller:show')->bind('posts.show');

$app->post('/posts/{id}/like', 'like.controller:store')->bind('like.store');;
