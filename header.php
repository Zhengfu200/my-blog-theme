<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version.
 */
_deprecated_file(
	/* translators: %s: Template name. */
	sprintf(__('Theme without %s'), basename(__FILE__)),
	'3.0.0',
	null,
	/* translators: %s: Template name. */
	sprintf(__('Please include a %s template in your theme.'), basename(__FILE__))
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php echo wp_get_document_title(); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- 引入 Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 引入 Bootstrap JS 和 Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

	<?php if (file_exists(get_stylesheet_directory() . '/images/kubrickbgwide.jpg')) { ?>
		<style type="text/css" media="screen">
			<?php
			// Checks to see whether it needs a sidebar.
			if (empty($withcomments) && !is_single()) {
				?>
				#page {
					background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg-<?php bloginfo('text_direction'); ?>.jpg") repeat-y top;
					border: none;
				}

			<?php } else { // No sidebar. ?>
				#page {
					background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top;
					border: none;
				}

			<?php } ?>
		</style>
	<?php } ?>

	<?php
	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="top-menu">
		<nav class="top-nav">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'top-menu', // 使用注册的菜单位置
					'container' => false, // 不使用 div 包裹
					'menu_class' => 'top-menu', // 设置菜单的类名
					'fallback_cb' => false, // 如果没有菜单，什么都不显示
				));
			?>
		</nav>
	</div>
</header>
<div id="page">