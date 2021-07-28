<?php

if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
 
    <?php if ( have_comments() ) : ?>
        <h5 class="comments-title text-center">Комментарии</h5>
 
        <ul class="u8-comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 40,
                    'callback' => 'u8_sirius_comment',
                    'post_author' => get_post_field('post_author')
                ) );
            ?>
        </ul>
 
        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
        <?php endif; ?>
 
    <?php endif; // have_comments() ?>
 
    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' ); 
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
    $comment_args = array(
        'fields' => array(
            'author' => '<div class="form-group comment-form-author">
			<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
			<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
		    </div>',
            'email'  => '<div class="form-group comment-form-email">
                <label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
                <input id="email" class="form-control" name="email type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . ' />
            </div>',
            'cookies' => '<div class="form-check comment-form-cookies-consent">'.
                sprintf( '<input id="wp-comment-cookies-consent" class="form-check-input" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) .'
                <label for="wp-comment-cookies-consent" class="form-check-label">'. __( 'Сохранить мои данные в браузере для последующих комментариев.' ) .'</label>
            </div>'
        ),
        'comment_field' => '<div class="form-group comment-form-comment">
                <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
                <textarea id="comment" name="comment" class="form-control" rows="8" aria-required="true" required="required"></textarea>
            </div>',
        'class_submit' => 'btn btn-primary u8-btn-primary',
        'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
        'format' => 'html5'
    );
    comment_form($comment_args); 
    ?>
</div>