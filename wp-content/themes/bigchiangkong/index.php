<?php get_header(); ?>

<?php if( is_front_page() ): get_template_part("page","front"); else: get_template_part("page"); endif;?>

<?php get_footer(); ?>
