		<?php /* Site Navigation */ ?>
		<nav class="nav-Primary">
			<header class="nav-Intro">
				<h1 class="nav-Title"><a href="<?php bloginfo('url'); ?>"><span class="a">A</span><span class="b">B</span></a></h1>
				<?php aleksblago_nav(); ?>
			</header>
			<div class="nav-Search">
				<form role="search" method="get" class="nav-SearchForm" name="search" action="<?php echo home_url( '/' ); ?>">
					<input type="text" name="s" class="nav-SearchInput" placeholder="Search for stuff...">
				</form>	
			</div>
			<footer class="nav-Footer">
				<ul class="nav-Social">
					<li><a href="https://twitter.com/_aleksblago" target="_blank"><i class="fa fa-fw fa-twitter"></i></a></li>
					<li><a href="http://www.last.fm/user/aleksblago" target="_blank"><i class="fa fa-fw fa-lastfm"></i></a></li>
					<li><a href="https://www.linkedin.com/in/aleksblago" target="_blank"><i class="fa fa-fw fa-linkedin"></i></a></li>
					<li><a href="https://github.com/aleksblago" target="_blank"><i class="fa fa-fw fa-github-alt"></i></a></li>
					<li><a href="http://codepen.io/aleksblago/" target="_blank"><i class="fa fa-fw fa-codepen"></i></a></li>
				</ul>
				&copy; 2004-<?php echo date('Y'); ?>
			</footer>
			<div class="nav-Background"></div>
		</nav>