<?php get_header();?>
<content class="container">
    <div class="row">
        <div class="col-8">
            <?php $count = 0; ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="d-flex flex-column post">
                    <div class='post-header'>
                        <h2 class='text-center'><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <small><b>Дата</b>: <?php the_date(); ?> <b>Автор</b>: <?php the_author_posts_link(); ?></small>
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
                        <div class="post-categories">Категории: <?php the_category( ', ' ); ?></div>
                        <div class='post-tags'><?php the_tags(); ?></div>
                    </div>
                </article> 
            <?php endwhile; endif;?>
        </div>
        <div class="col-4">

        </div>
    </div>
</content>   
<?php get_footer();?>