<?php get_header(); ?>

<header>
    <div class="banner-content">
        <h1 id="typed-title"></h1>
        <p class="site-description"><?php bloginfo('description'); ?></p>
    </div>
</header>

<div class="content">
    <div class="main">
        <ul class="post-list">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                <li>
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-meta">By <?php the_author(); ?> | <?php the_time('F j, Y'); ?></p>
                    <p class="post-excerpt"><?php the_excerpt(); ?></p>
                </li>
            <?php
                endwhile;
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </ul>
    </div>

    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>

<!--标题打字动画（实验性）-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var blogTitle = "<?php bloginfo('name'); ?>"; // 获取博客标题
        var typedTitleElement = document.getElementById("typed-title");
        var charIndex = 0;

        function typeTitle() {
            if (charIndex < blogTitle.length) {
                typedTitleElement.innerHTML += blogTitle.charAt(charIndex);
                charIndex++;
                setTimeout(typeTitle, 100); // 控制打字速度
            }
        }

        typeTitle(); // 开始打字动画
    });
</script>

