<?php if (!is_single()) : ?>
	
	<a href="<?php the_permalink(); ?>" class="ui-TextQuote" itemprop="url">
		<span itemprop="articleBody"><?php the_content(); ?></span>
	</a>
	
<?php else : ?>
	
	<div class="ui-TextQuote" itemprop="articleBody">
		<?php the_content(); ?>
	</div>

<?php endif; ?>