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

function my_custom_shuoshuo_init() { 
    $labels = array( 
        'name' => '说说',
        'singular_name' => '说说', 
        'all_items' => '所有说说',
        'add_new' => '发表说说', 
        'add_new_item' => '撰写新说说',
        'edit_item' => '编辑说说', 
        'new_item' => '新说说', 
        'view_item' => '查看说说', 
        'search_items' => '搜索说说', 
        'not_found' => '暂无说说', 
        'not_found_in_trash' => '没有已遗弃的说说', 
        'parent_item_colon' => '',
        'menu_name' => '说说'
    ); 
    $args = array( 
        'labels' => $labels, 
        'public' => true, 
        'publicly_queryable' => true, 
        'show_ui' => true, 
        'show_in_menu' => true, 
        'query_var' => true, 
        'rewrite' => true, 
        'capability_type' => 'post', 
        'has_archive' => true, 
        'hierarchical' => false, 
        'menu_position' => null, 
        'supports' => array('title','editor','author') 
    ); 
register_post_type('shuoshuo',$args); 
}
