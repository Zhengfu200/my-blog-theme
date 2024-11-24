<div class="widget">
    <h3>Recent Posts</h3>
    <ul>
        <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 5,
            'post_status' => 'publish',
        ));
        foreach ($recent_posts as $post) :
        ?>
            <li><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="widget">
    <h3>Categories</h3>
    <ul>
        <?php wp_list_categories(array(
            'title_li' => '',
        )); ?>
    </ul>
</div>
