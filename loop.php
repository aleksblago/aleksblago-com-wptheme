<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
	
	<?php
	$image_only = aleksMetaBox::get('image-only') == 'true' ? true : false;
	$text_quote = aleksMetaBox::get('text-quote') == 'true' ? true : false;
	?>

	<article class="ui-Post" itemscope itemtype="http://schema.org/BlogPosting">
		
	<?php if ($image_only) : ?>
		<?php get_template_part('ui-ImageFeature'); ?>
	<?php endif; ?>
	
	<?php if ($text_quote) : ?>
		<?php get_template_part('ui-TextQuote'); ?>
	<?php endif; ?>
	
	<?php // IF we have a regular article... ?>
	<?php if (!$image_only && !$text_quote) : ?>
		<?php get_template_part('ui-PostBody'); ?>
	<?php endif; ?>
	
		<?php get_template_part('ui-PostFooter'); ?>
		
	</article>
	
	<?php if (is_single() && !$image_only) : ?>
	
		<?php comments_template('/ui-Comments.php'); ?>
		
	<?php endif; ?>
		
<?php endwhile; else: ?>

	<article class="ui-Post">
		<header class="ui-PostHeader">
			<h1>Whoops! Looks like this page doesn't have content.</h1>
		</header>
		<div class="ui-PostBody"></div>
		<footer class="ui-PostFooter"></footer>
	</article>

<?php endif; //End Main Loop ?>

<?php if (is_home() || is_front_page() || is_archive() || is_search()) : ?>

<div class="nav-PageNavigation">
	<div class="nav-PrevPosts"><?php next_posts_link( '<i class="fa fa-long-arrow-left"></i> Older Posts' ); ?></div>
	<div class="nav-NextPosts"><?php previous_posts_link( 'Newer Posts <i class="fa fa-long-arrow-right"></i>' ); ?></div>
</div>

<?php endif; ?>