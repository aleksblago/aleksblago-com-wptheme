<header class="Post-header">
	
	<?php get_template_part('partials/Post-feature'); ?>
	
	<?php if (is_singular()) : ?>
		<h1 itemprop="name headline"><?php the_title(); ?></h1>
	<?php else : ?>
		<h1 itemprop="name headline"><a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h1>
	<?php endif; ?>
	
	<?php get_template_part('partials/Post-meta'); ?>

</header>

<div class="Post-body" itemprop="<?php echo is_singular() ? 'articleBody' : 'description'; ?>">
	<?php if (is_singular()) : ?>
	<?php the_content(); ?>
	<?php else : ?>
	<?php the_excerpt(); ?>
	<?php endif; ?>
</div>