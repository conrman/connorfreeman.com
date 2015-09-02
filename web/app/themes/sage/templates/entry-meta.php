<small>
  <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date('M d, Y'); ?></time>
  <span class="byline author vcard">
    <?= __('-', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a>
  </span>
</small>
