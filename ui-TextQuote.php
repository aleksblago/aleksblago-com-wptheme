<?php if (!is_single()) : ?>
	
	<a href="<?php the_permalink(); ?>" class="ui-TextQuote" itemprop="url">
		<?php the_content(); ?>
	</a>
	
<?php else : ?>
	
	<div class="ui-TextQuote">
		<?php the_content(); ?>
	</div>

<?php endif; ?>