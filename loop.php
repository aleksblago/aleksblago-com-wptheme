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
	
	<?php if (!$image_only && !$text_quote) : ?>
		
		<header class="ui-PostHeader">
			
			<?php get_template_part('ui-PostFeature'); ?>
			
			<?php if (is_singular()) : ?>
				<h1 itemprop="name headline"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 itemprop="name headline"><a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h1>
			<?php endif; ?>
			
			<?php get_template_part('ui-PostMeta'); ?>

		</header>
		
		<div class="ui-PostBody<?php echo (in_category('quotes')) ? ' Quotes' : ''; ?>"<?php echo is_singular() ? ' itemprop="articleBody"' : ' itemprop="description"'; ?>>
			<?php if (is_singular()) : ?>
			<?php the_content(); ?>
			<?php else : ?>
			<?php the_excerpt(); ?>
			<?php endif; ?>
		</div>
		
		<?php get_template_part('ui-PostFooter'); ?>
		
	<?php endif; ?>
		
	</article>
	
	<?php comments_template('/ui-Comments.php'); ?>
	
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