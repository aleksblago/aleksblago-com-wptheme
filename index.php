<?php get_header(); ?>
	<div class="ui-Container">

		<?php get_template_part('nav-Primary'); ?>

		<div class="ui-ContentContainer">
			
		<?php if (is_archive()) : ?>
			<div class="ui-ArchiveTitle"><span><?php the_archive_title(); ?></span></div>
		<?php elseif (is_search()) : ?>
			<div class="ui-SearchTitle"><span>Search Results <strong>for</strong>: <?php the_search_query(); ?></span></div>
		<?php endif; ?>
			
			<?php get_template_part('loop'); ?>
		
		</div>
		
	</div><?php /* end .ui-Container */ ?>
<?php get_footer(); ?>