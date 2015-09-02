<?

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <? language_attributes(); ?>>
<? get_template_part('templates/head'); ?>
<body <? body_class(); ?>>
    <!--[if lt IE 9]><div class="alert alert-warning"><? _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?></div><![endif]-->

      <div class="wrapper-layout">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

          <?
          do_action('get_header');
          get_template_part('templates/header');
          ?>

          <main class="mdl-layout__content">
            <div class="page-content mdl-grid">
              <? if (Config\display_sidebar()): ?>
              <section class="page-content__section mdl-cell mdl-cell--9-col">
                  <? include Wrapper\template_path(); ?>
              </section>
              <aside class="page-content__sidebar page-content__sidebar--fixed mdl-cell mdl-cell--3-col" role="complementary">
                <? include Wrapper\sidebar_path();?>
              </aside>
              <? else : ?>
              <section class="page-content__section mdl-cell mdl-cell--12-col">
                  <? include Wrapper\template_path(); ?>
              </section>
              <? endif; ?>
            </div>
          <?
          do_action('get_footer');
          get_template_part('templates/footer');
          wp_footer();
          ?>
          </main>
        </div>
      </div>
  </body>
</html>
