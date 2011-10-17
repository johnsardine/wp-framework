<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyeleven_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyeleven' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		
		<header>
			<hr/>
			<h3>
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentyeleven' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
			</h3>
		</header>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav class="comment-navi">
			<strong><?php _e( 'Comment navigation', 'twentyeleven' ); ?></strong>
			<div class="clear"></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'twentyeleven' ) ); ?></div>
			<div class="nav-previous"><?php previous_comments_link( __( '&laquo; Older Comments', 'twentyeleven' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ul>
			<?php wp_list_comments( array( 'callback' => 'js_comment' ) ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav class="comment-navi cf">
			<strong><?php _e( 'Comment navigation', 'twentyeleven' ); ?></strong>
			<div class="clear"></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'twentyeleven' ) ); ?></div>
			<div class="nav-previous"><?php previous_comments_link( __( '&laquo; Older Comments', 'twentyeleven' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		
		<?php if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<hr class="stripes mt"/>
			<h4 class="textcenter mb"><?php _e('i\'m sorry, but this discussion is closed.','js'); ?></h4>
			<hr class="stripes mb"/>

		<?php endif; ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<hr class="stripes mt"/>
		<h4 class="textcenter mb"><?php _e('i\'m sorry, but this discussion is closed.','js'); ?></h4>
		<hr class="stripes mb"/>
	<?php endif; ?>

	<?php js_comment_form(); ?>

</div><!-- #comments -->