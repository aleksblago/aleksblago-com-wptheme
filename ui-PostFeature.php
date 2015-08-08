<?php

$embed = aleksMetaBox::get('featured-embed');
$image_only = aleksMetaBox::get('image-only') != '' ? true : false;
$text_quote = aleksMetaBox::get('text-quote') != '' ? true : false;
$embed_type = '';
$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
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

?>

<div class="ui-PostFeature <?php echo ($embed !== '') ? 'featured-' . $embed_type : '' ?>" <?php echo ($has_both && $embed_type != 'video' && $embed_type != 'codepen') ? 'style="background: url('. $thumbnail_url .') top center;"' : ''; ?>>
	
	<?php echo ($embed !== '') ? $embed : ''; ?>
	
	<?php if (has_post_thumbnail() && $embed === '') : ?>
	
		<?php if (is_singular()) : ?>
		
			<?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?>
			
		<?php else : ?>
		
			<a href="<?php the_permalink(); ?>" itemprop="url"><?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?></a>
			
		<?php endif; ?>
	
	<?php endif; ?>
</div>