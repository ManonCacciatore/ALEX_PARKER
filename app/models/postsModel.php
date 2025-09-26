<?php


namespace App\Models\PostsModel;


use \PDO;

function findAll(PDO $connexion, int $limit = 10): array
{
    $sql = "SELECT posts.*, categories.name AS category_name
            FROM posts
            INNER JOIN categories 
            ON posts.category_id = categories.id
            ORDER BY posts.created_at DESC
            LIMIT :limit;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}


function findOneById(PDO $connexion, int $id): array
{
    $sql = "SELECT posts.*, categories.name AS category_name
            FROM posts
            INNER JOIN categories 
            ON posts.category_id = categories.id
            WHERE posts.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
