<?php

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true );
}

add_action( 'init', 'quotes_register' );  

function quotes_register() {
    $labels = array(
        'name' => __( 'Quotes', 'cabana' ),
        'add_new' => __( 'Add New', 'cabana' ),
        'add_new_item' => __( 'Add New Quote', 'cabana' ),
        'edit_item' => __( 'Edit Quote Item', 'cabana' ),
        'new_item' => __( 'New Quote Item', 'cabana' ),
        'view_item' => __( 'View Quote Item', 'cabana' ),
        'search_items' => __( 'Search Quote Items', 'cabana' ),
        'not_found' => __( 'No items found', 'cabana' ),
        'not_found_in_trash' => __( 'No items found in Trash', 'cabana' ), 
        'parent_item_colon' => '',
        'menu_name' => 'Quotes'
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
        'rewrite' => true,
        'exclude_from_search' => true,
        'supports' => array( 'title', 'page-attributes' )
       );  

    register_post_type( 'quotes' , $args );
}

add_action( 'contextual_help', 'quotes_help_text', 10, 3 );

function quotes_help_text( $contextual_help, $screen_id, $screen ) {
    if ( 'quotes' == $screen->id ) {
        $contextual_help =
        '<h3>' . __( 'Things to remember when adding a Quote:', 'cabana' ) . '</h3>' .
        '<ul>' .
        '<li>' . __( 'Give the Quote a reference name. This will not appear on your site, and is just for reference purposes (ie; Quote from Acme Company).', 'cabana' ) . '</li>' .
        '<li>' . __( 'Enter a short quote or testimonial.', 'cabana' ) . '</li>' .
        '<li>' . __( 'Enter the name of the quote author.', 'cabana' ) . '</li>' .
        '</ul>';
    }
    elseif ( 'edit-quotes' == $screen->id ) {
        $contextual_help = '<p>' . __( 'A list of all quotes appear below. To edit a quote, click on the quote Reference Name.', 'cabana' ) . '</p>';
    }
    return $contextual_help;
}

add_filter( 'manage_edit-quotes_columns', 'quotes_edit_columns' );   

function quotes_edit_columns( $columns ) {
        $columns = array(
            'cb' => '<input type=\'checkbox\' />',
            'title' => 'Reference Name',
            'description' => 'Quote',
            'text' => 'Author Name'
        );  

        return $columns;
}

add_action( 'manage_posts_custom_column',  'quotes_custom_columns' ); 

function quotes_custom_columns( $column ) {
        global $post;
        switch ( $column )
        {
            case 'description':
                $custom = get_post_custom();
                echo $custom['gt_quotes_quote'][0];
                break;
            case 'text':
                $custom = get_post_custom();
                echo $custom['gt_quotes_author'][0];
                break;
        }
}
 
function quotes_save_order() {
    global $wpdb;
 
    $order = explode( ',', $_POST['order'] );
    $counter = 0;
 
    foreach ( $order as $post_id ) {
        $wpdb->update( $wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $post_id) );
        $counter++;
    }
    die( 1 );
}
add_action( 'wp_ajax_post_sort', 'quotes_save_order' );

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'gt_';
 
$meta_box_quotes = array(
		'id' => 'quote_details',
        'title' => __('Quote Details', 'cabana'),
        'page' => 'quotes',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
        	array(
        		'name' => __( 'Quote', 'cabana' ),
        	    'desc' => __( 'Enter a short quote or testimonial', 'cabana' ),
        	    'id' => $prefix . 'quotes_quote',
        	    'type' => 'text',
        	    'std' => ''
        	),
            array(
            	'name' => __( 'Author Name', 'cabana' ),
                'desc' => __( 'Enter the author name of the above quote (ie; Acme Company)', 'cabana' ),
                'id' => $prefix . 'quotes_author',
                'type' => 'text',
                'std' => ''
            )
    )
);

add_action( 'admin_menu', 'gt_add_box_quotes' );

/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function gt_show_box_quotes() {
    global $meta_box_quotes, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="gt_add_box_quotes_nonce" value="', wp_create_nonce( basename( __FILE__ ) ), '" />';

	echo '<table class="form-table">';
		
	foreach ( $meta_box_quotes['fields'] as $field ) {
		// get current post meta data
		$meta = get_post_meta( $post->ID, $field['id'], true );
			
			echo '<tr>',
				'<th style="width:25%; font-weight: normal;"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><p style=" display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</p></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES )), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			echo '</td></tr>';
		
		}
		
		echo '</table>';
}

add_action( 'save_post', 'gt_save_data_quotes' );

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function gt_add_box_quotes() {
	global $meta_box_quotes;
	
	add_meta_box( $meta_box_quotes['id'], $meta_box_quotes['title'], 'gt_show_box_quotes', $meta_box_quotes['page'], $meta_box_quotes['context'], $meta_box_quotes['priority'] );
}

// Save data from meta box
function gt_save_data_quotes( $post_id ) {
    global $meta_box_quotes;

    // verify nonce
    if ( !isset( $_POST['gt_add_box_quotes_nonce'] ) || !wp_verify_nonce( $_POST['gt_add_box_quotes_nonce'], basename( __FILE__ ) ) ) {
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

    foreach ( $meta_box_quotes['fields'] as $field ) { // save each option
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