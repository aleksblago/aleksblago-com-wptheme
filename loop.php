<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
	
	<?php
	
	$embed = aleksMetaBox::get('featured-embed');
	$embedType = '';
	$plusBackground = '';
	$thumbUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$hasBoth = ($embed !== '' && has_post_thumbnail());
	
	if (strpos($embed, 'twitter.com')) {
		$embedType = 'twitter';
	} elseif (strpos($embed, 'youtube.com') || strpos($embed, 'vimeo.com')) {
		$embedType = 'video';
	} elseif (strpos($embed, 'instagram.com')) {
		$embedType = 'instagram';
	} elseif (strpos($embed, 'codepen.io')) {
		$embedType = 'codepen';
	} elseif (strpos($embed, 'vine.co')) {
		$embedType = 'vine';
	}
	?>

	<article class="ui-Post" itemscope itemtype="http://schema.org/BlogPosting">

		<header class="ui-PostHeader">
			
			<div class="ui-PostFeature <?php echo ($embed !== '') ? 'featured-' . $embedType : '' ?>" <?php echo ($hasBoth && $embedType != 'video' && $embedType != 'codepen') ? 'style="background: url('. $thumbUrl .') top center;"' : ''; ?>>
			<?php if (is_singular()) : ?>
			
				<?php echo ($embed !== '') ? $embed : ''; ?>
				
				<?php if (has_post_thumbnail() && $embed === '') : ?>
				<?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?>
				<?php endif; ?>
				
			<?php elseif (is_home() || is_front_page() || is_archive() || is_search()) : ?>
			
				<?php echo ($embed !== '') ? $embed : ''; ?>
				<?php if (has_post_thumbnail() && $embed === '') : ?>
				<a href="<?php the_permalink(); ?>" itemprop="url"><?php the_post_thumbnail('large', array('class' => 'ui-PostImage', 'itemprop' => 'image')); ?></a>
				<?php endif; ?>
				
			<?php endif; ?>
			</div>
			
		<?php if (is_singular()) : ?>
			<h1 itemprop="name headline"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 itemprop="name headline"><a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h1>
		<?php endif; ?>
		<?php
			// IF we're on the default homepage, on a dynamic blog page, on an archive page, or on a single post page.
			// Basically, exclude the author and date on a static homepage.
		?>
		<?php // if ((is_front_page() && is_home()) || is_home() || is_archive() || is_search() || is_single()) : ?>
		<?php if (!is_page()) : ?>
		<?php
			$categories = get_the_category();
			$the_category = $categories[0]->cat_name;
			$category_id = get_cat_ID( $the_category );
			$category_link = get_category_link( $category_id );
		?>
			<div class="ui-PostMeta">
				<span itemprop="author" itemscope itemtype="http://schema.org/Person"><i class="fa fa-fw fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>" itemprop="url" rel="author"><span itemprop="name"><?php the_author(); ?></span></a></span>
				<span><i class="fa fa-fw fa-folder-open"></i> <a href="<?php echo $category_link; ?>" title="<?php the_title(); ?> is categorized in <?php echo $the_category; ?>" itemprop="articleSection"><?php echo $the_category; ?></a></span>
				<span><i class="fa fa-fw fa-clock-o"></i> <?php echo do_shortcode('[est_time]'); ?></span>
				<span><i class="fa fa-fw fa-calendar"></i> <span itemprop="datePublished"><?php the_date(); ?></span></span>
			</div>
		<?php endif; ?>
		</header>
		
		<div class="ui-PostBody<?php echo (in_category('quotes')) ? ' Quotes' : ''; ?>"<?php echo is_singular() ? ' itemprop="articleBody"' : ' itemprop="description"'; ?>>
			<?php if (is_singular()) : ?>
			<?php the_content(); ?>
			<?php else : ?>
			<?php the_excerpt(); ?>
			<?php endif; ?>
		</div>
		
		<footer class="ui-PostFooter">
		<?php if (!is_singular()) : ?>
			<a href="<?php the_permalink(); ?>" class="nav-ReadMore" itemprop="url">Read More</a>
		<?php elseif(is_single()) : ?>
			<ul class="soc-SharePost">
				<li class="soc-SharePost-title">Share This Article</li>
				<li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" class="soc-SharePost-btn"> <i class="fa fa-fw fa-facebook"></i></a></li>
				<li><a target="_blank" href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;via=_aleksblago&amp;text=<?php echo urlencode(get_the_title()); ?>" class="soc-SharePost-btn"><i class="fa fa-fw fa-twitter"></i></a></li>
				<li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php echo urlencode(get_the_permalink()); ?>" class="soc-SharePost-btn"> <i class="fa fa-fw fa-google-plus"></i></a></li>
			</ul>
			
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

<?php if (is_home() || is_front_page() || is_archive() || is_search()) : ?>

<div class="nav-PageNavigation">
	<div class="nav-PrevPosts"><?php next_posts_link( '<i class="fa fa-long-arrow-left"></i> Older Posts' ); ?></div>
	<div class="nav-NextPosts"><?php previous_posts_link( 'Newer Posts <i class="fa fa-long-arrow-right"></i>' ); ?></div>
</div>

<?php endif; ?>