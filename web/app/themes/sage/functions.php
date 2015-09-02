<?
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 			// Utility functions
  'lib/init.php',                  			// Initial theme setup and constants
  'lib/wrapper.php',               		// Theme wrapper class
  'lib/conditional-tag-check.php',	// ConditionalTagCheck class
  'lib/config.php',                			// Configuration
  'lib/custom-fields.php',     			// Custom Fields Configuration
  'lib/nav.php',     					// Navigation Configuration
  'lib/assets.php',                			// Scripts and stylesheets
  'lib/titles.php',                     // Page titles
  'lib/shortcodes.php',                	// Shortcodes
  'lib/extras.php',                			// Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/**
 *  Comments
 */

function sage_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
  ?>
  <<? echo $tag ?> <? comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<? comment_ID() ?>">
  <? if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<? comment_ID() ?>" class="comment-body">
    <? endif; ?>

    <!-- Comment Meta -->
    <div class="comment-meta commentmetadata"><a href="<? echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
      <?
      /* translators: 1: date, 2: time */
      printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><? edit_comment_link( __( '(Edit)' ), '  ', '' );
      ?>
    </div>

    <!-- Awaiting Approval -->
    <? if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><? _e( 'This comment is awaiting moderation.' ); ?></em>
      <br />
    <? endif; ?>

    <!-- Author Vcard -->
    <div class="comment-author vcard">
      <? if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
      <? printf( __( '<span class="fn">%s</span>' ), get_comment_author_link() ); ?>
    </div>


    <div class="comment-text">
      <? comment_text(); ?>
    </div>

    <!-- Reply -->
    <div class="reply">
      <? comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <? if ( 'div' != $args['style'] ) : ?>
    </div>
  <? endif; ?>
  <?
}
add_action('comment', 'sage_comment');
