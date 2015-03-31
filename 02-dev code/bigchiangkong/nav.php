<!----- start-header---->
<div id="home" class="header">
    <div class="top-header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo home_url(); ?>" style="color: #fff">BIGCHIANGKONG</a>
            </div>
            <!----start-top-nav---->
            <nav class="top-nav">
                <nav role="navigation">
                    <?php wp_nav_menu(array(
                        'container' => false,                           // remove nav container
                        'container_class' => '',                 // class of container (should you choose to use it)
                        'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
                        'menu_class' => 'top-nav',               // adding custom nav class
                        'theme_location' => 'main-nav',                 // where it's located in the theme
                        'before' => '',                                 // before the menu
                        'after' => '',                                  // after the menu
                        'link_before' => '',                            // before each link
                        'link_after' => '',                             // after each link
                        'depth' => 0,                                   // limit the depth of the nav
                        'fallback_cb' => ''                             // fallback function (if there is one)
                    )); ?>

                </nav>
<!--                <ul class="top-nav">-->
<!--                    <li class="active"><a href="#home" class="scroll">Home</a><span> </span></li>-->
<!--                    <li><a href="#category" class="scroll">Cateogry</a></li>-->
<!--                    <li><a href="#news" class="scroll">News</a></li>-->
<!--                    <li><a href="#about" class="scroll">About</a></li>-->
<!--                    <li><a href="#contact" class="scroll">Contact</a></li>-->
<!--                </ul>-->
                <a href="#" id="pull"><img src="<?php echo get_template_directory_uri(); ?>/library/images/nav-icon.png" title="menu" /></a>
            </nav>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!----- //End-header---->