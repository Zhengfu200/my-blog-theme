<?php get_header(); ?>

<div class="content">
    <div class="main">
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                ?>
                <div class="title-and-author">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <p class="post-meta">By <?php the_author(); ?> | <?php the_time('F j, Y'); ?></p>
                </div>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <div class="comments">
                    <?php
                    if (comments_open() || get_comments_number()):
                        comments_template();
                    endif;
                    ?>
                </div>

                <?php
            endwhile;
        else:
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>

    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .main .title-and-author{
        background-color: white;
        border-radius: 10px;
    }

    .main .title-and-author .post-title{
        padding: 5px;
        margin-left: 20px;
    }

    .main .title-and-author .post-meta{
        margin-left: 20px;
        padding: 5px;
    }
</style>

<?php get_footer(); ?>