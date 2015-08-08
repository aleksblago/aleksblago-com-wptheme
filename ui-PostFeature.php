<?php

$embed = aleksMetaBox::get('featured-embed');
$embed_type = '';
$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$has_both = ($embed !== '' && has_post_thumbnail());

if (strpos($embed, 'twitter.com')) {
	$embed_type = 'twitter';
} elseif (strpos($embed, 'youtube.com') || strpos($embed, 'vimeo.com')) {
	$embed_type = 'video';
} elseif (strpos($embed, 'instagram.com')) {
	$embed_type = 'instagram';
} elseif (strpos($embed, 'codepen.io')) {
	$embed_type = 'codepen';
} elseif (strpos($embed, 'vine.co')) {
	$embed_type = 'vine';
}

$thumbnail_as_background = ($has_both && $embed_type != 'video' && $embed_type != 'codepen') ? 'style="background: url('. $thumbnail_url .') top center;"' : '';

?>

<div class="ui-PostFeature <?php echo ($embed !== '') ? 'featured-' . $embed_type : '' ?>" <?php echo $thumbnail_as_background; ?>>
	
	<?php echo ($embed !== '') ? $embed : ''; ?>
	
	<?php if (has_post_thumbnail() && $embed === '') : ?>
	
		<?php if (is_singular() && in_category('infographics')) : // Link image to the full sized image when its an infographic. ?>
		
			<a href="<?php echo $thumbnail_url; ?>" itemprop="url"><?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?></a>
			
		<?php elseif (is_singular()) : // Regular post image ?>
		
			<?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?>
			
		<?php else : // We're on an archive page so link to the article. ?>
		
			<a href="<?php the_permalink(); ?>" itemprop="url"><?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?></a>
			
		<?php endif; ?>
	
	<?php endif; ?>
	
</div>