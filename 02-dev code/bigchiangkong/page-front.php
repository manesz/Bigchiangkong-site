<div class="aboutus">
    <div class="container">
        <h2>หจก. มหาสวัสดิ์ มอเตอร์ (บิ๊กเซียงกง)<br/>
            MAHASAWAT MOTOR LTD. PART. (BIG CHIANGKONG)</h2>
        <span> </span>
        <div class="col-md-12 aboutus-left">
            <?php
            // WP_Query arguments
            $args = array (
                'pagename'                   => 'front page',
                'posts_per_page'         => '-1',
            );

            // The Query
            $query = new WP_Query( $args );

            if( $query->have_posts() ):
                while ( $query->have_posts() ) : $query->the_post();
                    the_content();
                endwhile;
            else :
                echo "<h1>No Data.</h1>";
            endif;
            ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!---- about us ---->
<!---- QUOTE ---->
<div class="quote text-center">
    <div class="container">
        <p>จำหน่าย : <?php echo get_bloginfo ( 'description' ); ?></p>
    </div>
</div>
<!---- //QUOTE ---->
<!---- WORKS ---->
<div id="work" class="works">
    <div class="container">
        <h2>สินค้าของเรา</h2>
        <span> </span>
    </div>
    <!---- partners ---->
    <div class="partners" style="height: auto;">
        <!----sreen-gallery-cursual---->
        <div class="sreen-gallery-cursual">
            <!-- start content_slider -->

            <div class="container">
                <div id="owl-demo" class="owl-carousel">

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

                    <div class="item image" style="">
                        <?php
                        get_post_custom_values("position", get_the_ID());
                        $position = get_post_custom_values( 'position' );
                        ?>
                        <?php
                            $postID = get_the_id();
                            $url = wp_get_attachment_url( get_post_thumbnail_id($postID) );
                            if(!empty($url)){
                        ?>
                            <img class="lazyOwl" alt="" src="<?php echo $url;?>" style="" />
                        <?php
                            } else {
                        ?>
                            <img class="lazyOwl" alt="" src="<?php echo get_template_directory_uri();?>/library/images/nothumb.gif" style="" />
                        <?php
                            }//END: if
                        ?>

                        <a href="<?php echo the_permalink();?>" target="_blank"><label style="width: 100%; height: 100%;"><?php the_title(); ?></label></a>
                    </div><!-- END: .item -->

                    <?php
                        endwhile;
                    endif;
                    ?>

                </div><!-- END: #owl-demo .owl-carousel -->
            </div><!-- END: .container -->
            <!--//sreen-gallery-cursual---->

        </div><!-- END: .sreen-gallery-cursual -->
        <!---- //partners ---->
        <!----project-grid---->
        <div class="project-grid">
            <div class="container">
                <img class="project-screen" src="http://localhost:1100/project/bigchiangkong/wp-content/uploads/2014/08/full-screen.png" title="name" style="width: 100%;"/>
            </div>
        </div>
        <!----project-grid---->
        <div class="clearfix"></div>
    </div><!-- END .partner -->
</div><!-- END: .work -->
<!---- //WORKS ---->
<!----contact-map---->
<div class="contact-map clearfix">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3874.591169662949!2d100.29082230000002!3d13.8035017!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2936f0aafe361%3A0x381b7b2c31e605ad!2z4LiW4LiZ4LiZIOC4l-C4suC4h-C4q-C4peC4p-C4h-C4iuC4meC4muC4lyDguJnguITguKPguJvguJDguKEgNDAwNiDguJXguLPguJrguKUg4Lio4Liy4Lil4Liy4Lii4LiyIOC4reC4s-C5gOC4oOC4rSDguJ7guLjguJfguJjguKHguJPguJHguKUg4LiI4Lix4LiH4Lir4Lin4Lix4LiUIOC4meC4hOC4o-C4m-C4kOC4oSA3MzE3MCDguJvguKPguLDguYDguJfguKjguYTguJfguKI!5e0!3m2!1sth!2s!4v1406316348876" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>
<!----contact-map---->