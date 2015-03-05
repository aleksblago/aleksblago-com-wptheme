<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

	<article class="ui-Post">

		<header class="ui-PostHeader">
		<?php if (has_post_thumbnail()) : ?>
			<?php if (is_singular()) : ?>
			<?php the_post_thumbnail('large', array('class' => 'ui-PostImage')); ?>
			<?php elseif (is_home() || is_front_page() || is_archive()) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class' => 'ui-PostImage')); ?></a>
			<?php endif; ?>
		<?php endif; ?>
		<?php if (is_singular()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php endif; ?>
		<?php if (is_home() || is_front_page() || is_archive() || is_single()) : ?>
			<div class="ui-PostMeta">
				<span><i class="fa fa-fw fa-user"></i> <?php the_author_posts_link(); ?></span>
				<span><i class="fa fa-fw fa-calendar"></i> April 5, 2015</span>
			</div>
		<?php endif; ?>
		</header>
		
		<div class="ui-PostBody">
			<?php if (is_singular()) : ?>
			<?php the_content(); ?>
			<?php else : ?>
			<?php the_excerpt(); ?>
			<?php endif; ?>
		</div>
		
		<footer class="ui-PostFooter">
		<?php if (!is_singular() || is_home() || is_front_page()) : ?>
			<a href="<?php the_permalink(); ?>" class="ui-Button--more">Read More</a>
		<?php elseif(is_single()) : ?>
			<div class="ui-PostPrev"></div>
			<div class="ui-PostNext"></div>
		<?php endif; ?>
		</footer>
		
	</article>
	
<?php endwhile; else: ?>

	<article class="ui-Post">
		<header class="ui-PostHeader">
			<h1>Whoops! Looks like this page doesn't have content.</h1>
		</header>
		<div class="ui-PostBody"></div>
		<footer class="ui-PostFooter"></footer>
	</article>

<?php endif; ?>