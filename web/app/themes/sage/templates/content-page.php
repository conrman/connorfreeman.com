<div class="mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>
  <div class="mdl-card__supporting-text">
    <?php the_content(); ?>
  </div>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
