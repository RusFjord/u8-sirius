<?php get_header();?>
<content class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Test if the current post is in category 3. -->
        <!-- If it is, the div box is given the CSS class "post-cat-three". -->
        <!-- Otherwise, the div box is given the CSS class "post". -->

        <article class="d-flex flex-column post">


            <!-- Display the Title as a link to the Post's permalink. -->
            <div class='post-header'>
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


            <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

            <small>Дата: <?php the_time('F jS, Y'); ?> Автор: <?php the_author_posts_link(); ?></small>
            </div>
            <div class='d-flex justify-content-center post-image'>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>

            <!-- Display the Post's content in a div box. -->
            <div class='post-content'>
                <?php if (is_single()) { 
                    the_content(); 
                } else {
                    the_excerpt();
                } ?>
            </div>

            <!-- Display a comma separated list of the Post's Categories. -->
            <div class='post-footer'>
                <div class="post-category">Категории: <?php the_category( ', ' ); ?></div>
            </div>
        </article> <!--closes the first div box  -->

    <?php endwhile; endif;?>

</content>   
<?php get_footer();?>