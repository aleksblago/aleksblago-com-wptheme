<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<meta name="format-detection" content="telephone=yes">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<?php if (is_search()) : ?>
	<meta name="robots" content="noindex, nofollow" />
	<?php endif; ?>

	<title><?php wp_title(''); ?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon/apple-touch-icon.png">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if (!current_user_can('activate_plugins')) : ?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-32004612-1', 'auto');
	ga('require', 'linkid');
	ga('send', 'pageview');
	</script>
	<?php endif; ?>
	
	<?php wp_head(); ?>
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('sitename') ?> Feed" href="<?php echo get_bloginfo('rss2_url') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>

<body itemscope itemtype="http://schema.org/WebPage">