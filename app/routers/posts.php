<?php

use \App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['posts']):
    case 'show':
        PostsController\showAction($connexion, $_GET['id']);
        break;
    case 'addForm':
        PostsController\addFormAction($connexion);
        break;
    case 'addInsert':
        PostsController\addInsertAction($connexion, $_POST);
        break;
    case "delete":
        PostsController\deleteAction($connexion, $_GET['id']);
        break;

endswitch;
