<?php get_header();?>
<content class="container u8-container">
    <div class="row">
        <div class="col-8">
            <?php $count = 0; ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="d-flex flex-column post">
                    <div class='post-header'>
                        <h2 class='text-center'><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <small>
                            <span class="u8-article-metadata">
                                <i class="fas fa-calendar-day"></i>
                                <?php the_date(); ?>
                            </span>
                            <span class="u8-article-metadata">
                                <i class="fas fa-user"></i>
                                <?php the_author_posts_link(); ?>
                            </span>
                        </small>
                    </div>
                    <?php 
                        $left_right_thumbs = (($count % 2) > 0) ? 'd-flex flex-row' : 'd-flex flex-row-reverse'; 
                        $count++;
                    ?>
                    <div class="<?php echo $left_right_thumbs ?>">
                    <?php if (!is_single()) : ?>
                        <div class='d-flex justify-content-center post-image'>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                    <?php endif;?>
                    <div class='post-content'>
                        <?php if (is_single()) { 
                            the_content(); 
                        } else {
                            the_excerpt();
                        } ?>
                    </div>
                    </div>
                    <div class='d-flex flex-column post-footer'>
                        <div class="post-categories"><i class="fas fa-folder"></i>Категории: <?php the_category( ', ' ); ?></div>
                        <div class='post-tags'><i class="fas fa-tags"></i><?php the_tags(); ?></div>
                        <div class='post-comments'><i class="fas fa-comments"></i>
                            <?php
                                if (!is_single()) {
                                    $num_comments = get_comments_number();

                                    if ( comments_open() ) {
                                        if ( $num_comments == 0 ) {
                                            $comments = __('Нет комментариев');
                                        } else {
                                            $comments = __('Комментарии') . ' (' . $num_comments . ')';
                                        }
                                        echo '<a href="' . get_comments_link() .'">' . $comments . '</a>';
                                    } else {
                                        echo  __('Комментарии для этой записи отключены.');
                                    }
                                }
                            ?>    
                        </div>
                    </div>
                    <div class='u8-comments'>
                        <?php if (is_single()) { 
                            comments_template(); 
                            } 
                        ?>
                    </div>
                </article> 
            <?php endwhile; endif;?>
            <?php 
                $args = [

                    'show_all'     => false,
                    'prev_next'    => true,
                    'prev_text'    => __('« Предыдущие'),
                    'next_text'    => __('Следующие »'),
                    'type'         => 'plain',
                    'before_page_number' => '',
                    'after_page_number'  => ''
                ];
                the_posts_pagination( $args );
                ?>
        </div>
        <div class="col-4">
            <?php dynamic_sidebar( 'right-area' ); ?>
        </div>
    </div>
</content>   
<?php get_footer();?>