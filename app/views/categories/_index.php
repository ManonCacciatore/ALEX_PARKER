<ul class="menu-link">
    <?php
    include '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);
    foreach ($categories as $category):
    ?>
        <li>
            <a href="#"><?php echo $category['name'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>