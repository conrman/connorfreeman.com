<article <? post_class('mdl-card mdl-shadow--2dp'); ?>>
  <div class="mdl-card__media">
    <a href="<?= get_permalink(); ?>" class="mdl-car__media-link mdl-js-button mdl-js-ripple-effect">
      <? if (has_post_thumbnail()) {
        the_post_thumbnail('', array('class'=>'mdl-card__media-image'));
      } ?>
    </a>
  </div>
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text"><? the_title(); ?></h2>
  </div>
  <div class="mdl-card__meta">
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
  </div>
  <div class="mdl-card__supporting-text">
    <? the_excerpt(); ?>
  </div>
</article>
