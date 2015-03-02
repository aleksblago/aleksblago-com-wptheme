<?php get_header(); ?>
<?php get_template_part('navigation'); ?>

		<div class="ui-ContentContainer">

		<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
		
			<article class="ui-Post">
	
				<header class="ui-PostHeader">
					<?php if (has_post_thumbnail()) : ?>
					<img src="<?php the_post_thumbnail(); ?>" class="ui-PostImage" />
					<?php endif; ?>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</header>
				
				<div class="ui-PostBody">
					<?php the_excerpt(); ?>
				</div>
				
				<footer class="ui-PostFooter">
					<a href="<?php the_permalink(); ?>" class="ui-Button--more">Read More</a>
				</footer>
				
			</article>
			
		<?php endwhile; else: ?>
		
			<article class="ui-Post">
				<h1>Whoops! Looks like this page doesn't have content.</h1>
			</article>

		<?php endif; ?>
		
		</div>

<?php get_footer(); ?>