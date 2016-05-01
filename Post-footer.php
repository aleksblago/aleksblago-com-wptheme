<?php
$image_only = aleksMetaBox::get('image-only') == 'true' ? true : false;
$text_quote = aleksMetaBox::get('text-quote') == 'true' ? true : false;

// IF image...ELSEIF text quote...ELSE article...ELSE page.
if ($image_only && !$text_quote) {
	$type = 'Image';
} else if ($text_quote && !$image_only) {
	$type = 'Quote';
} else if (is_single()) {
	$type = 'Article';
} else {
	$type = 'Page';
}

?>
	
<?php if (!is_singular() && !$image_only && !$text_quote) : ?>
	
<footer class="Post-footer Post-footer--more">
	
	<a href="<?php the_permalink(); ?>" class="nav-ReadMore" itemprop="url">Read More</a>
	
</footer>

<?php elseif(is_singular()) : ?>
	
<footer class="Post-footer">
	
	<?php if (has_tag()) : ?>
	<div class="Post-tags"><i class="fa fa-fw fa-tags"></i> Tags: <span itemprop="keywords"><?php the_tags('',', ',''); ?></span></div>
	<?php endif; ?>	
	
	<ul class="soc-SharePost">
		<li>Share This <?php echo $type; ?></li>
		<li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" class="soc-SharePost-btn" title="Share <?php the_title(); ?> on Facebook"> <i class="fa fa-fw fa-facebook"></i></a></li>
		<li><a target="_blank" href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;via=_aleksblago&amp;text=<?php echo urlencode(get_the_title()); ?>" class="soc-SharePost-btn" title="Share <?php the_title(); ?> on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
		<li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php echo urlencode(get_the_permalink()); ?>" class="soc-SharePost-btn" title="Share <?php the_title(); ?> on Google Plus"> <i class="fa fa-fw fa-google-plus"></i></a></li>
	</ul>
	
	<?php if (is_single()) : ?>
	<div class="nav-PostNavigation">
		<div class="nav-NextPost">
			<?php previous_post_link('%link'); ?>
		</div>
		<div class="nav-PrevPost">
			<?php next_post_link('%link'); ?>
		</div>
	</div>
	<?php endif; ?>	
	
</footer>

<?php endif; // End Post Footer ?>