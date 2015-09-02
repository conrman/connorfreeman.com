<? while (have_posts()) : the_post(); ?>
<article <? post_class('mdl-card mdl-shadow--2dp'); ?>>
	<div class="mdl-card__media">
		<? if (has_post_thumbnail()) {
			the_post_thumbnail('', array('class'=>'mdl-card__media-image'));
		} ?>
	</div>
	<div class="mdl-card__title">
		<h1 class="mdl-card__title-text"><? the_title(); ?></h1>
	</div>
	<div class="mdl-card__supporting-text">
		<? the_content(); ?>
	</div>
	<footer>
		<? wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
	</footer>
</article>
<? comments_template('/templates/comments.php'); ?>
<? endwhile; ?>
