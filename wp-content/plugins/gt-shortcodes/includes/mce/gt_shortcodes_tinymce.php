<?php

class GT_TinyMCE_Buttons {
	function __construct() {
    	add_action( 'admin_head', array(&$this,'init') );
    }
    function init() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
			return;
		//if ( get_user_option( 'rich_editing' ) == 'true' ) {
            global $wp_version;
            if ($wp_version >= 3.9) {
                wp_enqueue_style('gt_shortcodes_icon', plugin_dir_url(__FILE__) . 'js/css/gt_shortcodes_icon.css');
            }
            add_filter( 'mce_buttons', array(&$this,'register_button' ) );
            add_filter('mce_external_plugins', array(&$this, 'add_plugin'));
		//}
    }
	function add_plugin( $plugin_array ) {
        global $wp_version;
        if ($wp_version < 3.9) {
            $plugin_array['gt_shortcodes'] = plugin_dir_url(__FILE__) . 'js/gt_shortcodes_tinymce.js';
        } else {
            $plugin_array['gt_shortcodes'] = plugin_dir_url(__FILE__) . 'js/gt_shortcodes_tinymce3.9.js';
        }
	    return $plugin_array;
	}
	function register_button( $buttons ) {  
	   array_push( $buttons, 'gt_shortcodes_button' );
	   return $buttons; 
	} 	
}
$gtshortcode = new GT_TinyMCE_Buttons;