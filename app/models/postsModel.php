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


function insertOne($connexion, $data)
{

    $sql = "INSERT INTO posts
            SET
            title = :title,
            text = :text,
            quote = :quote,
            category_id = :category_id,
            created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    return $rs->execute();
}


function deleteOneById($connexion, $id)
{
    $sql = "DELETE FROM posts
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return $rs->execute();
}

function updateOneById($connexion, $id, $data)
{

    $sql = "UPDATE posts
            SET 
            title = :title,
            text = :text,
            quote = :quote,
            category_id = :category_id
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);

    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    return $rs->execute();
}
