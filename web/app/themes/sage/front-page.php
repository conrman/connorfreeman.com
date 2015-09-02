<div class="mdl-grid">
<? if (have_posts()) : while(have_posts()) : the_post(); ?>
  <div <? post_class('mdl-cell')?>>
    <? get_template_part('templates/content', ''); ?>
  </div>
<? endwhile; ?>
  <?php get_template_part('templates/pagination'); ?>
<? endif; ?>