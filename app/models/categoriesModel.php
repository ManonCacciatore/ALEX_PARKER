<?php

namespace App\Models\CategoriesModel;

use \PDO;


function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM categories
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}


function findAllWithPostCount(PDO $connexion)
{
    $sql = "SELECT c.*, COUNT(p.id) AS post_count
        FROM categories c
        LEFT JOIN posts p ON p.category_id = c.id
        GROUP BY c.id
        ORDER BY c.name ASC;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
