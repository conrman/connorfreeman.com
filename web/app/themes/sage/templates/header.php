<header role="banner">
	<div class="container-fluid">
		<nav class="navbar" role="navigation">
			<div class="nav-header">
				<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
			</div>
			<?php
			if (has_nav_menu('primary_navigation')) :
				wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
			endif;
			?>
		</nav>
	</div>
</header>
