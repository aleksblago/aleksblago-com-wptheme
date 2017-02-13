<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
	
	<?php
	$image_only = aleksMetaBox::get('image-only') == 'true' ? true : false;
	$text_quote = aleksMetaBox::get('text-quote') == 'true' ? true : false;
	?>

	<article class="Post" itemscope itemtype="http://schema.org/BlogPosting">
		
	<?php if ($image_only) : ?>
		<?php get_template_part('partials/ImageFeature'); ?>
	<?php endif; ?>
	
	<?php if ($text_quote) : ?>
		<?php get_template_part('partials/TextQuote'); ?>
	<?php endif; ?>
	
	<?php // IF we have a regular article... ?>
	<?php if (!$image_only && !$text_quote) : ?>
	
		<?php // Then show the article body. ?>
		<?php get_template_part('partials/Post-body'); ?>
		
	<?php endif; ?>
	
		<?php
		// Otherwise, just show the footer since we handle
		// the image and text only posts in a different way.
		?>
		<?php get_template_part('partials/Post-footer'); ?>
		
	</article>
	
	<?php if (is_single()) : ?>
	
		<?php comments_template(); ?>
		
	<?php endif; ?>
		
<?php endwhile; else: ?>

	<article class="Post">
		<header class="Post-missing">
			<h1>Whoops! Looks like this page doesn't have content.</h1>
		</header>
	</article>

<?php endif; //End Main Loop ?>

<?php if (is_archive() || is_search()) : ?>

<div class="nav-PageNavigation">
	<div class="nav-PrevPosts"><?php next_posts_link( '<i class="fa fa-long-arrow-left"></i> Older Posts' ); ?></div>
	<div class="nav-NextPosts"><?php previous_posts_link( 'Newer Posts <i class="fa fa-long-arrow-right"></i>' ); ?></div>
</div>

<?php endif; ?>