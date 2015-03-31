<div id="sidebar mobile-disable" class="col-lg-3">
<!--    <form class="clearfix">-->
<!--        <input type="text" class="col-lg-9" placeholder="enter search"/>-->
<!--        <input type="submit" class="btn btn-link btn-search col-lg-3" value="search"/>-->
<!--    </form>-->

    <li class="categories clearfix mobile-disable"><span><?php _e('Search for:'); ?></span>
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>" style="padding-top: 10px;">
            <input type="search" class="search-field col-lg-12" placeholder="enter text" value="" name="s" title="Search for:" style="padding: 5px;"/>
<!--            <input type="submit" class="btn btn-link btn-search col-lg-3" value="search"/>-->
        </form>
    </li>
    <li class="categories clearfix"><span><?php _e('Categories:'); ?></span>
        <ul class="nav bs-docs-sidenav">
            <?php wp_list_cats(); ?>
        </ul>
    </li>

</div><!-- END: #sidebar -->
