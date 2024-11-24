<?php get_header(); ?>

<div class="content">
    <div class="main">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
            <h2 class="post-title"><?php the_title(); ?></h2>
            <p class="post-meta">By <?php the_author(); ?> | <?php the_time('F j, Y'); ?></p>
            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <div class="comments">
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>

        <?php
            endwhile;
        else :
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>

    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
