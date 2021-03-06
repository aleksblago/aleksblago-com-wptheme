<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>

<?php
	if ( post_password_required() ) : ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	
<?php return; endif; ?>
	
<?php if ( comments_open() ) : ?>
<section class="Comments">

<?php $required_text = null;

$args = array(
	'id_form'           => 'commentform',
	'id_submit'         => 'submit',
	'title_reply'       => __( 'Leave a Reply' ),
	'title_reply_to'    => __( 'Replying to %s' ),
	'cancel_reply_link' => __( 'Cancel' ),
	'label_submit'      => __( 'Post a Reply' ),

	'comment_field' => '<label class="Comments-label" title="Please share your thoughts, we would love to hear them!">Your Comments</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="Comments-input"></textarea>',

	'must_log_in' => '<p class="must-log-in">' .
	sprintf(
	  __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	) . '</p>',

	'logged_in_as' => '<p class="logged-in-as">' .
	sprintf(
	__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
		admin_url( 'profile.php' ),
		$user_identity,
		wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	) . '</p>',

	'comment_notes_before' => '',
	'comment_notes_after' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
			'<label class="Comments-label" for="author" title="Your name is required to post a comment.">Name <span class="required">*</span></label>'.
			'<input name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="Comments-input" />',
			
		'email' =>
			'<label class="Comments-label" for="email" title="Your email address is required to post a comment.">Email Address <span class="required">*</span></label>'.
			'<input name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="Comments-input" />',
			
		'url' =>
			'<label class="Comments-label" for="url" title="If you would like to share your website url publicly, enter it here.">Website URL</label>'.
			'<input name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="Comments-input" />'
		)

	)
);

comment_form($args); ?>

</section>
<?php endif; // if you delete this the sky will fall on your head ?>

<section class="Comments">
	
	<h4 class="Comments-title"><?php comments_number('No comments yet', 'One comment', '% comments');?> on "<?php the_title(); ?>"</h4>

	<?php if ( have_comments() ) : ?>
	
		<?php wp_list_comments(
			array(
				'walker' => new comment_walker(),
				'max_depth' => '',
				'style' => 'div',
				'reply_text' => 'Reply',
				'avatar_size' => 60
			)
		); ?>
		
	<?php endif; ?>
	
	<?php if ( comments_open() && !have_comments() ) : ?>
		<?php // If comments are open, but there are no comments. ?>
		<p>Be the first to share your thoughts!</p>
		
	<?php elseif ( !comments_open() ) : ?>

		<p>Comments are now closed.</p>
		
	<?php endif; ?>
	
</section>