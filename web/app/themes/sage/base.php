<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
      <![endif]-->

      <?php
      do_action('get_header');
      get_template_part('templates/header');
      get_template_part('templates/carousel');
      ?>
      <div class="wrap container-fluid" role="document">
      	<div class="content row">
      		<?php if (Config\display_sidebar()) : ?>
      			<aside class="sidebar" role="complementary">
      				<?php include Wrapper\sidebar_path(); ?>
      			</aside><!-- /.sidebar -->
      		<?php endif; ?>
      		<main class="main" role="main">
      			<section class="col-xs-12 col-sm-10">
      				<?php include Wrapper\template_path(); ?>
      			</section>
      			<?php if (Config\display_mainfab()) : ?>
      				<div class="col-sm-2">
      					<button id="app-fab" class="btn btn-fab btn-raised btn-material-red animate fadeIn">
      						<i class="mdi-action-grade"></i>
      					</button>
      				</div>
      			<?php endif; ?>
      		</main><!-- /.main -->
      	</div><!-- /.content -->
      </div><!-- /.wrap -->
      <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
      ?>
    </body>
    </html>
