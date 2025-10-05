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

function addFormAction(PDO $connexion): void
{
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);

    global $content, $title;
    $title = 'Add a post';
    ob_start();
    include '../app/views/posts/addForm.php';
    $content = ob_get_clean();
}


function addInsertAction(PDO $connexion, array $data): void
{
    include_once '../app/models/postsModel.php';
    $reponse = PostsModel\insertOne($connexion, $data);
    header('Location:' . PUBLIC_BASE_URL);
}


function deleteAction(PDO $connexion, int $id): void
{
    include_once '../app/models/postsModel.php';
    $response = PostsModel\deleteOneById($connexion, $id);
    header('Location:' . PUBLIC_BASE_URL);
}


function editFormAction(PDO $connexion, int $id): void
{
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($connexion, $id);

    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);

    global $content, $title;
    $title = "Edit a post";
    ob_start();
    include '../app/views/posts/editForm.php';
    $content = ob_get_clean();
}

function editUpdateAction(PDO $connexion, int $id, array $data): void
{
    include_once '../app/models/postsModel.php';
    $response = PostsModel\updateOneById($connexion, $id, $data);

    header('Location:' . PUBLIC_BASE_URL . 'posts/' . $id . '/' . \Core\Helpers\slugify($data['title']) . ".html");
}
