<?php
// 支持特色图片
add_theme_support('post-thumbnails');

// 强制加载最新的 CSS 文件，避免缓存问题
function my_blog_enqueue_styles() {
    wp_enqueue_style('my-blog-theme-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
}

add_action('wp_enqueue_scripts', 'my_blog_enqueue_styles');

function register_my_menus() {
    register_nav_menus(
        array(
            'top-menu' => __( 'Top Navigation Menu' )
        )
    );
}
add_action( 'after_setup_theme', 'register_my_menus' );
