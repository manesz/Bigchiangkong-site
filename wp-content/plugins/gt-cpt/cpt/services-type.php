<?php

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true );
}

add_action( 'init', 'services_register' );  

function services_register() {
    $labels = array(
        'name' => __( 'Services', 'cabana' ),
        'add_new' => __( 'Add New', 'cabana' ),
        'add_new_item' => __( 'Add New Service', 'cabana' ),
        'edit_item' => __( 'Edit Service Item', 'cabana' ),
        'new_item' => __( 'New Service Item', 'cabana' ),
        'view_item' => __( 'View Service Item', 'cabana' ),
        'search_items' => __( 'Search Service Items', 'cabana' ),
        'not_found' => __( 'No items found', 'cabana' ),
        'not_found_in_trash' => __( 'No items found in Trash', 'cabana' ), 
        'parent_item_colon' => '',
        'menu_name' => 'Services'
        );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => false,
        'exclude_from_search' => true,
        'supports' => array( 'title', 'editor', 'page-attributes' )
       );  

    register_post_type( 'services' , $args );
}

add_action( 'contextual_help', 'services_help_text', 10, 3 );
function services_help_text( $contextual_help, $screen_id, $screen ) {
    if ( 'services' == $screen->id ) {
        $contextual_help =
        '<h3>' . __( 'Things to remember when adding a Service:', 'cabana' ) . '</h3>' .
        '<ul>' .
        '<li>' . __( 'Give the Service a title. (ie; Website Development or Photography).', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a short excerpt to describe your service.', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add an icon (via Shortcode) for your service.', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a page URL for your service to link to (if required).', 'cabana' ) . '</li>' .
        '</ul>';
    }
    elseif ( 'edit-services' == $screen->id ) {
        $contextual_help = '<p>' . __( 'A list of all services items appear below. To edit an item, click on the items title.', 'cabana' ) . '</p>';
    }
    return $contextual_help;
}

add_filter( 'manage_edit-services_columns', 'services_edit_columns' );

function services_edit_columns( $columns ) {
        $columns = array(
            'cb' => '<input type=\'checkbox\' />',
            'title' => 'Service',
            'service_description' => 'Description',
        );  

        return $columns;
}

add_action( 'manage_posts_custom_column',  'services_custom_columns'); 

function services_custom_columns( $column ){
        global $post;
        switch ( $column )
        {

            case 'service_description':
                the_content();
                break;
        }
}
 
function services_save_order() {
    global $wpdb;
 
    $order = explode( ',', $_POST['order'] );
    $counter = 0;
 
    foreach ( $order as $post_id ) {
        $wpdb->update( $wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $post_id ) );
        $counter++;
    }
    die(1);
}

add_action( 'wp_ajax_post_sort', 'services_save_order' );

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'gt_';
 
$meta_box_service = array(
	'id' => 'service_details',
    'title' => __( 'Service Details', 'cabana' ),
    'page' => 'services',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
        	'name' => __( 'Service Icon', 'cabana' ),
            'desc' => __( 'Add an Icon for your service via Shortcode <br />Example: [icon name=fa-dropbox]<br /><br />A list of all available icons can be found <a href="http://fortawesome.github.com/Font-Awesome" target="_blank">here</a>', 'cabana' ),
            'id' => $prefix . 'service_icon',
            'type' => 'text',
            'std' => ''
        ),
        array(
           'name' => __( 'Service URL', 'cabana' ),
           'desc' => __( 'Please add a page URL (if applicable) for this Service to link to', 'cabana' ),
           'id' => $prefix . 'service_url',
           'type' => 'text',
           'std' => ''
        )
    )
);

add_action( 'admin_menu', 'gt_add_box_service' );

/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function gt_show_box_service() {
    global $meta_box_service, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="gt_add_box_service_nonce" value="', wp_create_nonce( basename( __FILE__ ) ), '" />';

	echo '<table class="form-table">';
		
	foreach ( $meta_box_service['fields'] as $field ) {
		// get current post meta data
		$meta = get_post_meta( $post->ID, $field['id'], true );
			
			echo '<tr style="border-bottom:1px solid #eeeeee;">',
				'<th style="width:25%; font-weight: normal;"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><p style=" display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</p></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			echo '</td></tr>';
		
		}
		
		echo '</table>';
}

add_action( 'save_post', 'gt_save_data_service' );

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function gt_add_box_service() {
	global $meta_box_service;
	
	add_meta_box( $meta_box_service['id'], $meta_box_service['title'], 'gt_show_box_service', $meta_box_service['page'], $meta_box_service['context'], $meta_box_service['priority'] );
}

// Save data from meta box
function gt_save_data_service( $post_id ) {
    global $meta_box_service;

    // verify nonce
    if ( !isset( $_POST['gt_add_box_service_nonce'] ) || !wp_verify_nonce( $_POST['gt_add_box_service_nonce'], basename( __FILE__ ) ) ) {
    	return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    foreach ( $meta_box_service['fields'] as $field ) { // save each option
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ( $new && $new != $old ) { // compare changes to existing values
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    }
}

?>