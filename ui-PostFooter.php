<footer class="ui-PostFooter">
	
<?php if (!is_singular()) : ?>

	<a href="<?php the_permalink(); ?>" class="nav-ReadMore" itemprop="url">Read More</a>
	
<?php elseif(is_single()) : ?>
	
	<?php if (has_tag()) : ?>
	<div class="ui-PostTags"><i class="fa fa-fw fa-tags"></i> <?php the_tags('Tags: ', ', ', ''); ?></div>
	<?php endif; ?>	
	
	<ul class="soc-SharePost">
		<li class="soc-SharePost-title">Share This Article</li>
		<li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" class="soc-SharePost-btn" title="Share <?php the_title(); ?> on Facebook"> <i class="fa fa-fw fa-facebook"></i></a></li>
		<li><a target="_blank" href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;via=_aleksblago&amp;text=<?php echo urlencode(get_the_title()); ?>" class="soc-SharePost-btn" title="Share <?php the_title(); ?> on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
		<li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php echo urlencode(get_the_permalink()); ?>" class="soc-SharePost-btn" title="Share <?php the_title(); ?> on Google Plus"> <i class="fa fa-fw fa-google-plus"></i></a></li>
	</ul>
	
	<div class="nav-PostNavigation">
		<div class="nav-NextPost">
			<?php previous_post_link('%link'); ?>
		</div>
		<div class="nav-PrevPost">
			<?php next_post_link('%link'); ?>
		</div>
	</div>
	
<?php endif; // End Post Footer ?>

</footer>