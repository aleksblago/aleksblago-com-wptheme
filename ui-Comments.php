<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>



	
<?php if ( comments_open() ) : ?>
<section class="ui-Comments">

<?php $required_text = null;

$args = array(
	'id_form'           => 'commentform',
	'id_submit'         => 'submit',
	'title_reply'       => __( 'Leave a Comment' ),
	'title_reply_to'    => __( 'Replying to %s' ),
	'cancel_reply_link' => __( 'Cancel' ),
	'label_submit'      => __( 'Post Comment' ),

	'comment_field' =>  '<label class="ui-CommentsLabel">Your Comments</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="ui-CommentsInput"></textarea>',

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
  // 'comment_notes_after' => '',
  'comment_notes_after' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
  
  'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
			'<label class="ui-CommentsLabel" for="author">Name <span class="required">*</span></label>'.
			'<input name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="ui-CommentsInput" />',
			
		'email' =>
			'<label class="ui-CommentsLabel" for="email">Email Address <span class="required">*</span></label>'.
			'<input name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="ui-CommentsInput" />',
			
		'url' =>
			'<label class="ui-CommentsLabel" for="url">Website URL</label>'.
			'<input name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="ui-CommentsInput" />'
		)
  
	)
);

comment_form($args); ?>

</section>
<?php endif; // if you delete this the sky will fall on your head ?>

	
<section class="ui-Comments">
	
	<h4 class="ui-CommentsTitle"><?php comments_number('No Comments', 'One Comment', '% Comments');?> on "<?php the_title(); ?>"</h4>

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
		<!-- If comments are open, but there are no comments. -->
		<p>No comments yet.</p>
		
	<?php elseif ( !comments_open() ) : ?>

		<p>Comments are closed now.</p>
		
	<?php endif; ?>
	
</section>