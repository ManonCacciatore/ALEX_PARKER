<ul class="menu-link">
    <?php
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAllWithPostCount($connexion);
    foreach ($categories as $category):
    ?>
        <li>
            <a href="#"><?php echo $category['name'] ?> (<?php echo $category['post_count']; ?>)</a>
        </li>
    <?php endforeach; ?>
</ul>