<?php

foreach ($posts as $post) :
    $created_at = strtotime($post['created_at'])
?>
    <div class="col-md-12 blog-post row">
        <div class="post-title">
            <a href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>">
                <h1>
                    <?php echo $post['title']; ?>
                </h1>
            </a>
        </div>
        <div class="post-info">
            <span><?php echo date('Y', $created_at); ?>-<?php echo date('m', $created_at); ?>-<?php echo date('d', $created_at); ?></span> | <span><?php echo $post['category_name']; ?></span>
        </div>
        <p>
            <?php echo Core\Helpers\truncate($post['text']); ?>
        </p>
        <a
            href="posts/<?php echo $post['id']; ?>/<?php echo \Core\Helpers\slugify($post['title']); ?>"
            class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
    </div>

<?php endforeach; ?>