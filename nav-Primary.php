<?php /* Site Navigation */ ?>
<nav class="nav-Primary">
	<header class="nav-Intro">
		<h1 class="nav-Title"><a href="<?php bloginfo('url'); ?>/articles" itemprop="url"><span class="a">A</span><span class="b">B</span></a></h1>
		<?php aleksblago_nav(); ?>
	</header>
	<?php get_search_form(); ?>
	<footer class="nav-Footer">
		<ul class="nav-Social">
			<li><a href="https://www.linkedin.com/in/aleksblago" target="_blank" itemprop="url"><i class="fa fa-fw fa-linkedin"></i></a></li>
			<li><a href="https://twitter.com/_aleksblago" target="_blank" itemprop="url"><i class="fa fa-fw fa-twitter"></i></a></li>
			<li><a href="https://github.com/aleksblago" target="_blank" itemprop="url"><i class="fa fa-fw fa-github-alt"></i></a></li>
			<li><a href="http://codepen.io/aleksblago/" target="_blank" itemprop="url"><i class="fa fa-fw fa-codepen"></i></a></li>
			<li><a href="http://stackoverflow.com/users/973991/aleksblago" target="_blank" itemprop="url"><i class="fa fa-fw fa-stack-overflow"></i></a></li>
		</ul>
		&copy; 2004-<?php echo date('Y'); ?>
	</footer>
	<div class="nav-Background"></div>
</nav>