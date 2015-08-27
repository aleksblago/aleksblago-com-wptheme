<?php

$featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' );
$has_image = ( !isset($featured_image) || trim($featured_image) === '' ) ? false : true;

$image = ($has_image) ? 'style="background-image: url(' . $featured_image . ');"' : '';

?>

<?php if (is_single()) : ?>
	
	<div class="ui-TextQuote" itemprop="citation">
		<?php the_content(); ?>
		<?php if ($has_image) : ?>
		<div class="ui-TextQuoteOverlay"></div>
		<div class="ui-TextQuoteImage" <?php echo $image; ?>></div>
		<?php endif; ?>
	</div>
	
<?php else : ?>
	
	<a href="<?php the_permalink(); ?>" class="ui-TextQuote" itemprop="url">
		<span itemprop="citation"><?php the_content(); ?></span>
		<?php if ($has_image) : ?>
		<div class="ui-TextQuoteOverlay"></div>
		<div class="ui-TextQuoteImage" <?php echo $image; ?>></div>
		<?php endif; ?>
	</a>

<?php endif; ?>