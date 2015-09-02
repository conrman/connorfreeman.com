<form role="search" method="get" class="search-form" action="<?= esc_url(home_url('/')); ?>">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-search">
    <input class="mdl-textfield__input textfield-search__input-field" type="search" value="<?= get_search_query(); ?>" name="s" >
    <label class="mdl-textfield__label"><? _e('Search for:', 'sage'); ?></label>
  </div>
  <button type="submit" class="mdl-button textfield-search__submit-button"><? _e('Search', 'sage'); ?></button>
</form>
