<?php get_header(); ?>

    <div class="container" style="">

        <div id="work" class="works">
            <div class="container">
                <h2>สินค้าของเรา</h2>
                <span> </span>
            </div>
        </div>

        <div class="row">

            <?php
            // WP_Query arguments
            $args = array (
                'posts_per_page'         => '-1',
            );

            // The Query
            $query = new WP_Query( $args );

            if( $query->have_posts() ):

                while ( $query->have_posts() ) : $query->the_post();
                    ?>

                    <div class="col-lg-4 margin-bottom-30">
                        <div class="image">
                            <?php
                            $postID = get_the_id();
                            $url = wp_get_attachment_url( get_post_thumbnail_id($postID) );
                            if(!empty($url)):
                                ?>
                                <a href="<?php echo the_permalink();?>" target="_blank"><img class="img_thumb" alt="" src="<?php echo $url;?>" style="" /></a>
                            <?php else: ?>
                                <a href="<?php echo the_permalink();?>" target="_blank"><img class="img_thumb" alt="" src="<?php echo get_template_directory_uri();?>/library/images/nothumb.gif" style="" /></a>
                            <?php endif; ?>
                            <a href="<?php echo the_permalink();?>" target="_blank"> <label><?php the_title(); ?></label> </a>
                        </div><!-- END: .image -->
                    </div>

                <?php
                endwhile;//END: while loop post

            endif;//END: if check have_post()
            ?>

        </div><!-- #END: .row -->
    </div><!-- END: .container -->

<?php get_footer(); ?>