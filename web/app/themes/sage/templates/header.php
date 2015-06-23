<header class="app-header" role="banner">
	<div class="app-container container-fluid">
		<div class="col-sm-3 no-pad">
			<a class="app-profile" href="<? bloginfo('url'); ?>">
				<img class="app-profile-image img-circle" src="<? bloginfo("template_url"); ?>/dist/images/profile.jpg" alt="Profile">
				<h3 class="app-header-title">
					<? bloginfo(); ?>
				</h3>
			</a>


			<div id="primary-menu" class="primary-menu">
				<? 
				if (has_nav_menu('primary_navigation')) :
					wp_nav_menu([
					            'depth' => 2,
					            'theme_location' => 'primary_navigation', 
					            'menu_class' => 'nav', 
					            'walker' => new wp_bootstrap_navwalker()
					            ]);
				endif; 
				?>
			</div>
		</div>
	</div>
</header>