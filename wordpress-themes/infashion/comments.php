<?php 
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

 global $infashion_option;

if ( $infashion_option['display_comments'] ): // check on/ off display comments

// Do not delete these lines  
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die (_e('Please do not load this page directly. Thanks!', 'infashion'));

    if ( !empty( $post->post_password ) ) { // if there's a password
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {  // and it doesn't match the cookie
?>
    <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'infashion' ) ; ?></p>
<?php
        return;
        }
    }
?>

<?php if ( have_comments() ) : ?>

    <!-- START: COMMENT LIST -->
    <div id="respond" class="widgets comments-widget">
        <div class="inner">
            <h4 class="widget-title"><?php comments_number( __( 'No Comments', 'infashion' ), __( '1 Comment', 'infashion' ), __( '% Comments', 'infashion' ) ); ?></h4>
                <div class="comment-wrapper">
                    <ul>
                    <?php wp_list_comments( 'callback=warrior_comment_list' ); ?>
                    </ul>
                </div>
            
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <div class="navigation clearfix">
                    <span class="prev"><?php previous_comments_link(__( '&larr; Previous', 'infashion' ), 0); ?></span>
                    <span class="next"><?php next_comments_link(__( 'Next &rarr;', 'infashion' ), 0); ?></span>
                </div>  
            <?php endif; ?>
        </div>  
    </div>
    <!-- END: COMMENT LIST -->
    
<?php else : // or, if we don't have comments: ?>      
<?php endif; // end have_comments() ?> 

<!-- START: RESPOND -->
<?php if ( comments_open() ) : ?>
    <div id="comment-form-widget" class="widgets comments-widget">
        <div class="inner">
        <?php 
            comment_form( array(
                'title_reply'           =>  __( '<h4 class="widget-title">LEAVE A COMMENT</h4>','infashion' ),
                'comment_notes_before'  =>  '',
                'comment_notes_after'   =>  '',
                'label_submit'          =>  __( 'Submit', 'infashion' ),
                'cancel_reply_link'     =>  __( 'Cancel Reply', 'infashion' ),
                'logged_in_as'          =>  '<p class="logged-user">' . sprintf( __( 'You are logged in as <a href="%1$s">%2$s</a> &#8212; <a href="%3$s">Logout &raquo;</a>', 'infashion' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                'fields'                => array(
                    'author'                =>  '<div class="form-group col-60"><input type="text" name="author" id="input-name" class="input-s" value="" placeholder="'. __('Fullname', 'infashion') .'" /></div>',
                'email'                 =>  '<div class="form-group col-60"><input type="text" name="email" id="input-email" class="input-s" value=""  placeholder="'. __('Email Address', 'infashion') .'" /></div>',
                'url'                   =>  '<div class="form-group col-60"><input type="text" name="url" id="input-email" class="input-s" value="" placeholder="'. __('Web URL','infashion') .'" /></div>'
                                        ),
                'comment_field'         =>  '<div class="form-group col-100"><textarea name="comment" id="message" placeholder="'. __('Message', 'infashion') .'" /></textarea></div>',
                'label_submit'          => __('Submit','infashion')
                ));
        ?>
        </div>
    </div>
<?php endif; ?>
<!-- END: RESPOND -->

<?php endif; ?>
<!-- END: check on/ off comments -->

