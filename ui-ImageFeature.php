<?php if (!is_single()) : ?>

	<?php if (has_post_thumbnail()) : ?>
	
		<a href="<?php the_permalink(); ?>" class="ui-ImageFeature" itemprop="url">
			<?php the_post_thumbnail('large', array('itemprop' => 'image')); ?>
		</a>
		
	<?php endif; ?>
	
<?php else : ?>

	<?php if (has_post_thumbnail()) : ?>
	
		<div class="ui-ImageFeature">
			<?php the_post_thumbnail('large', array('itemprop' => 'image')); ?>
		</div>
	
	<?php endif; ?>
	
<?php endif; ?>
