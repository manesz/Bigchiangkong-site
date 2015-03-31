<?php get_header(); ?>


<div class="container" style="margin-top: 30px;">
    <div class="row">

        <div id="wrapper-container" class="col-lg-12">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php
                /*
                 * Ah, post formats. Nature's greatest mystery (aside from the sloth).
                 *
                 * So this function will bring in the needed template file depending on what the post
                 * format is. The different post formats are located in the post-formats folder.
                 *
                 *
                 * REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
                 * A SPECIFIC POST FORMAT.
                 *
                 * If you want to remove post formats, just delete the post-formats folder and
                 * replace the function below with the contents of the "format.php" file.
                */
                ?>

                <header class="article-header">

                    <h1 class="entry-title single-title" itemprop="headline" style="margin-top: 0px;"><?php the_title(); ?></h1>

                    <?php the_breadcrumb();?>

                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3874.591169662949!2d100.29082230000002!3d13.8035017!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2936f0aafe361%3A0x381b7b2c31e605ad!2z4LiW4LiZ4LiZIOC4l-C4suC4h-C4q-C4peC4p-C4h-C4iuC4meC4muC4lyDguJnguITguKPguJvguJDguKEgNDAwNiDguJXguLPguJrguKUg4Lio4Liy4Lil4Liy4Lii4LiyIOC4reC4s-C5gOC4oOC4rSDguJ7guLjguJfguJjguKHguJPguJHguKUg4LiI4Lix4LiH4Lir4Lin4Lix4LiUIOC4meC4hOC4o-C4m-C4kOC4oSA3MzE3MCDguJvguKPguLDguYDguJfguKjguYTguJfguKI!5e0!3m2!1sth!2s!4v1406316348876" width="100%" height="450" frameborder="0" style="border:0"></iframe>

                <?php the_content(); ?>

                </section> <?php // end article section ?>

            <?php endwhile; ?>

            <?php else : ?>

                <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
                    </footer>
                </article>

            <?php endif; ?>

        </div><!-- END: #wrapper-container -->

    </div><!-- #END: .row -->
    <div class="clearfix"> </div>
</div><!-- END: .container -->

<?php get_footer(); ?>
