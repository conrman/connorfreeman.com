<? use Roots\Sage\Config; ?>
<header class="mdl-layout__header">
  <div class="mdl-layout__header-row">
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
      <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
        <i class="material-icons">search</i>
      </label>
      <div class="mdl-textfield__expandable-holder">
        <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp" />
      </div>
    </div>
  </div>
</header>
<div class="mdl-layout__drawer">
  <span class="mdl-layout-title">Title</span>
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