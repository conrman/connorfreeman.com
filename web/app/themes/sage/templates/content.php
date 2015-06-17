<article ng-repeat="post in posts">
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>">{{ post }}</a></h2>
		<?php #get_template_part('templates/entry-meta'); ?>
	</header>
	<div class="entry-summary">
		{{ post.content }}
	</div>
</article>
