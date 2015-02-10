<?php

if( !function_exists ( 'gt_shortcodes_scripts' ) ) :
	function gt_shortcodes_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'gt_piechart', plugin_dir_url( __FILE__ ) . 'js/gt_piechart.js', array ( 'jquery' ), '1.0', true );
		wp_register_script( 'gt_tabs', plugin_dir_url( __FILE__ ) . 'js/gt_tabs.js', array ( 'jquery' ), '1.0', true );
		wp_register_script( 'gt_accordion', plugin_dir_url( __FILE__ ) . 'js/gt_accordion.js', array ( 'jquery' ), '1.0', true );
		wp_register_script( 'gt_skillbar', plugin_dir_url( __FILE__ ) . 'js/gt_skillbar.js', array ( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'gt_shortcodes_styles', plugin_dir_url( __FILE__ ) . 'css/gt_shortcodes_style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'gt_shortcodes_scripts' );
endif;