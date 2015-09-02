<? use Roots\Sage\Config; ?>
<header class="mdl-layout__header mdl-layout__header--waterfall">
  <div class="mdl-layout__header-row">
    <h1 class="mdl-layout__header-title"><? bloginfo(); ?></h1>
    <div class="mdl-layout-spacer"></div>

    <!-- Search Form -->
    <form role="search" method="get" class="search-form" action="<?= esc_url(home_url('/')); ?>">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input id="fixed-header-drawer-exp" class="mdl-textfield__input textfield-search__input-field" type="search" value="<?= get_search_query(); ?>" name="s" >
        </div>
      </div>
    </form>

    <a class="mdl-button mdl-button--mini-fab mdl-button--fab mdl-button--transparent mdl-js-button mdl-button--home mdl-js-ripple-effect" href="<? bloginfo('url'); ?>"><i class="material-icons ">home</i></a>
  </div>
  
  <div class="mdl-layout__header-row">
    <h2 class="mdl-layout__header-subtitle"><? bloginfo('description'); ?></h2>
    <div class="mdl-layout-spacer"></div>
  </div>
</header>
<div class="mdl-layout__drawer">
  <a class="profile" href="<? bloginfo('url'); ?>"><?= get_avatar('connormfreeman@gmail.com', '245px'); ?></a>
  <span class="mdl-layout-title"><? bloginfo(); ?></span>
  <?
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu([
                'depth' => 2,
                'theme_location' => 'primary_navigation', 
                'menu_class' => 'mdl-navigation', 
                'items_wrap' => '<nav id="%1$s" class="%2$s">%3$s</nav>',
                'walker' => new wp_mdl_navwalker()
                ]);
  endif; 
  ?>
</div>