<?php

// IF we're on the default homepage, on a dynamic blog page, on an archive page, or on a single post page.
// Basically, exclude the author and date on a static homepage.
// if ((is_front_page() && is_home()) || is_home() || is_archive() || is_search() || is_single()) :
?>

<?php if (!is_page()) :

	$categories = get_the_category();
	$the_category = $categories[0]->cat_name;
	$category_id = get_cat_ID( $the_category );
	$category_link = get_category_link( $category_id );
	
?>

<div class="Post-meta">
	<span itemprop="author" itemscope itemtype="http://schema.org/Person"><i class="fa fa-fw fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>" itemprop="url" rel="author"><span itemprop="name"><?php the_author(); ?></span></a></span>
	<span><i class="fa fa-fw fa-folder-open"></i> <a href="<?php echo $category_link; ?>" title="<?php the_title(); ?> is categorized in <?php echo $the_category; ?>" itemprop="articleSection"><?php echo $the_category; ?></a></span>
	<span><i class="fa fa-fw fa-calendar"></i> <span itemprop="datePublished"><?php the_date(); ?></span></span>
	<span><i class="fa fa-fw fa-clock-o"></i> <?php echo do_shortcode('[est_time]'); ?></span>
</div>

<?php endif; ?>