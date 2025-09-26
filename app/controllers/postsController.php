<?php


namespace App\Controllers\PostsController;


use \PDO;
use \App\Models\PostsModel;


function indexAction(PDO $connexion): void
{

    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($connexion, 10);


    global $content, $title;
    $title = "Blog";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id): void
{
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($connexion, $id);

    global $content, $title;
    $title = $post['title'];
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}
