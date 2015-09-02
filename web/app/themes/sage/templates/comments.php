<?
if (post_password_required()) {
	return;
}
?>
<? if (have_comments()) : ?>
<section id="comments" class="mdl-card mdl-shadow--2dp comments">
	<div class="mdl-card__supporting-text comments-body">
		<h2><? printf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?></h2>

		<div class="comment-list">
			<? 
			wp_list_comments([
			                    'style' => 'div', 
			                    'reverse_top_level' => true,
			                    'reverse_children' => true,
			                    'reply_text' => __('<span id="reply-button-%s" class="mdl-button mdl-button--colored mdl-button--fab mdl-button--mini-fab"><i class="material-icons">reply</i></span><div class="mdl-tooltip" for="reply-button">Reply</div>', rand(1,99)),
			                    'short_ping' => true,
			                    'type' => 'comment',
			                    'callback' => 'sage_comment'
			                    ]); 
			?>
		</div>

		<? if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav>
			<ul class="pager">
				<? if (get_previous_comments_link()) : ?>
				<li class="previous"><? previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
			<? endif; ?>
			<? if (get_next_comments_link()) : ?>
			<li class="next"><? next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
		<? endif; ?>
	</ul>
</nav>
<? endif; ?>

<? if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
<div class="alert alert-warning">
	<? _e('Comments are closed.', 'sage'); ?>
</div>
<? endif; ?>
</div>
</section>
<aside class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__supporting-text">
		<? 
$fields =  array(
   'author' =>
   '<div class="mdl-textfield mdl-js-textfield comment-form-author"><label class="mdl-textfield__label" for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
   ( $req ? '<span class="required">*</span>' : '' ) .
   '<input id="author" class="mdl-textfield__input" name="author" type="text" value="" size="30" required/></div>',

   'email' =>
   '<div class="mdl-textfield mdl-js-textfield comment-form-email"><label class="mdl-textfield__label" for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
   ( $req ? '<span class="required">*</span>' : '' ) .
   '<input id="email" class="mdl-textfield__input" name="email" type="text" value="" size="30" required/></div>',

   'url' =>
   '<div class="mdl-textfield mdl-js-textfield comment-form-url"><label class="mdl-textfield__label" for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
   '<input id="url" class="mdl-textfield__input" name="url" type="text" value="" size="30" required/></div>',
   );

$comment_args = array(
    'fields' => $fields,
    'class_submit' => 'mdl-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect',
    'comment_field' => '<div class="mdl-textfield mdl-js-textfield comment-form-comment"><label class="mdl-textfield__label" for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" class="mdl-textfield__input" name="comment" rows="8" aria-required="true" required></textarea></div>'
    );
    comment_form($comment_args); ?>
  </div>
</aside>
<? endif; // have_comments() ?>
