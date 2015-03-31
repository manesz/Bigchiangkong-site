<!----- start-header---->
<div id="home" class="front-header">
    <div class="header inner-shadow" style="">
        <div class="container ">
            <div class="logo">
                <a href="<?php echo home_url(); ?>" style="color: #fff">BIGCHIANGKONG</a>
            </div>
            <!----start-top-nav---->
            <nav class="top-nav">
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
                <a href="#" id="pull"><img src="<?php echo get_template_directory_uri(); ?>/library/images/nav-icon.png" title="menu" /></a>
            </nav>
            <div class="clearfix"> </div>
            <!----top-header-info--->
            <div class="top-header-info">
                <p style="width: auto; font-size: 40px;">
                    ยินดีต้อนรับ,
                </p>
                <p style="width: auto; font-size: 40px;">
                    หจก. มหาสวัสดิ์ มอเตอร์ (บิ๊กเซียงกง)
                </p>
                <p style="font-size: 30px; background: #000; opacity: .8; padding: 10px;"> จำหน่าย : เครื่องยนต์ หัวเก๋ง อะไหล่เก่าญี่ปุ่น รถ 4ล้อ, 6ล้อ, 10ล้อ, 12ล้อ</p>

                <a class="contactme" href="#">CONTACT ME</a>
            </div>
            <!----//End-header-info--->
        </div>
    </div>
</div>
<!----- //End-header---->