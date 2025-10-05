<?php

use \App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['posts']):
    case 'show':
        // Détails d'un post
        // PATTERN : ?posts=show&id=x
        // CTRL : postsController
        // ACTION : show
        PostsController\showAction($connexion, $_GET['id']);
        break;
    case 'addForm':
        // Formulaire d’ajout d’un post
        // PATTERN : ?posts=addForm
        // CTRL : PostsController
        // ACTION : addForm
        PostsController\addFormAction($connexion);
        break;
    case 'addInsert':
        // Insertion d’un post
        // PATTERN : ?posts=addInsert
        // CTRL : PostsController
        // ACTION : addInsert
        PostsController\addInsertAction($connexion, $_POST);
        break;
    case "delete":
        // Suppression d’un post
        // PATTERN : ?posts=delete&id=x
        // CTRL : PostsController
        // ACTION : delete
        PostsController\deleteAction($connexion, $_GET['id']);
        break;
    case "editForm":
        // Formulaire de modification d’un post
        // PATTERN : ?posts=editForm&id=x
        // CTRL : PostsController
        // ACTION : editForm
        PostsController\editFormAction($connexion, $_GET['id']);
        break;
    case "editUpdate":
        // Mise à jour d’un post
        // PATTERN : ?posts=editUpdate&id=x
        // CTRL : PostsController
        // ACTION : editUpdate
        PostsController\editUpdateAction($connexion, $_GET['id'], $_POST);
        break;
endswitch;
