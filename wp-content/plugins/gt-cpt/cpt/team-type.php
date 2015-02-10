<?php

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true );
}

add_action( 'init', 'team_register' );  

function team_register() {
    $labels = array(
        'name' => __( 'Team', 'cabana' ),
        'add_new' => __( 'Add New', 'cabana' ),
        'add_new_item' => __( 'Add New Team Member', 'cabana' ),
        'edit_item' => __( 'Edit Team Member', 'cabana' ),
        'new_item' => __( 'New Team Member', 'cabana' ),
        'view_item' => __( 'View Team Member', 'cabana' ),
        'search_items' => __( 'Search Team Members', 'cabana' ),
        'not_found' => __( 'No items found', 'cabana' ),
        'not_found_in_trash' => __( 'No items found in Trash', 'cabana' ), 
        'parent_item_colon' => '',
        'menu_name' => 'Team'
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
        'rewrite' => array( 'slug' => 'profile', 'with_front' => false ),
        'exclude_from_search' => true,
        'supports' => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
       );  

    register_post_type( 'team' , $args );
}

add_action( 'contextual_help', 'team_help_text', 10, 3 );

function team_help_text( $contextual_help, $screen_id, $screen ) {
    if ( 'team' == $screen->id ) {
        $contextual_help =
        '<h3>' . __( 'Things to remember when adding a Team Member:', 'cabana' ) . '</h3>' .
        '<ul>' .
        '<li>' . __( 'Add your team member name. (ie; Walter White).', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a short description (bio) for your member.', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a featured image (headshot possibly) for your team member.', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a job title for your team member. (ie; The Boss or Managing Director).', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a contact email for your team member.', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add any Social Networks your Team Member belongs to. (ie; Twitter or Linkedin).', 'cabana' ) . '</li>' .
        '<li>' . __( 'Add a short overview for your team member. (ie; Skills, Likes, Dislikes etc...).', 'cabana' ) . '</li>' .
        '</ul>';
    }
    elseif ( 'edit-team' == $screen->id ) {
        $contextual_help = '<p>' . __( 'A list of all team members appear below. To edit a member, click on the Team Member name.', 'cabana' ) . '</p>';
    }
    return $contextual_help;
}

function team_image_box() {
 	// Remove the orginal "Set Featured Image" Metabox
	remove_meta_box( 'postimagediv', 'team', 'side' );
 	// Add it again with another title
	add_meta_box( 'postimagediv', __( 'Team Member Image', 'cabana' ), 'post_thumbnail_meta_box', 'team', 'side', 'low' );
}
add_action( 'do_meta_boxes', 'team_image_box' );

add_filter( 'manage_edit-team_columns', 'team_edit_columns' );

function team_edit_columns( $columns ) {
        $columns = array(
            'cb' => '<input type=\'checkbox\' />',
            'title' => 'Team Member Name',
            'member_email' => 'Member Email',
            'member_description' => 'Bio',
        );  

        return $columns;
}

add_action( 'manage_posts_custom_column',  'team_custom_columns' ); 

function team_custom_columns( $column ) {
        global $post;
        switch ( $column )
        {

            case 'member_email':
                $custom = get_post_custom();
                echo $custom['gt_member_email_address'][0];
                break;
            case 'member_description':
                the_content();
                break;
        }
}
 
function team_save_order() {
    global $wpdb;
 
    $order = explode( ',', $_POST['order'] );
    $counter = 0;
 
    foreach ( $order as $post_id ) {
        $wpdb->update($wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $post_id) );
        $counter++;
    }
    die( 1 );
}
add_action( 'wp_ajax_post_sort', 'team_save_order' );

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'gt_';
 
$meta_box_team = array(
	'id' => 'team_member',
    'title' => __( 'Team Member Details', 'cabana' ),
    'page' => 'team',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
    	array(
    		'name' =>  __( 'Member Role', 'cabana' ),
    	    'desc' => __( 'Enter a role for the Team Member <br />(ie; Creative Director)', 'cabana' ),
    	    'id' => $prefix . 'member_role',
    	    'type' => 'text',
    	    'std' => ''
    	),
    	array(
    		'name' =>  __( 'Read More Button Text', 'cabana' ),
    	    'desc' => __( 'Enter text for your read more button <br />(ie; View full profile)', 'cabana' ),
    	    'id' => $prefix . 'member_readmore_button_text',
    	    'type' => 'text',
    	    'std' => ''
    	),
        array(
        	'name' =>  __( 'Member Email', 'cabana' ),
            'desc' => __( 'Enter an email for the Team Member <br />(ie; marc@guuthemes.com)', 'cabana' ),
            'id' => $prefix . 'member_email_address',
            'type' => 'text',
            'std' => ''
        ),
        array(
        	'name' =>  __( 'Email Button Text', 'cabana' ),
            'desc' => __( 'Enter text for your email button <br />(ie; Contact Marc)', 'cabana' ),
            'id' => $prefix . 'member_email_button_text',
            'type' => 'text',
            'std' => ''
        ),
        array(
           'name' => __( 'Twitter', 'cabana' ),
           'desc' => __( 'Enter your Twitter Profile URL <br />(ie; http://twitter.com/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_twitter',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Facebook', 'cabana' ),
           'desc' => __( 'Enter your Facebook Profile URL <br />(ie; http://facebook.com/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_facebook',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Google Plus', 'cabana' ),
           'desc' => __( 'Enter your Google + Profile URL <br />(ie; http://plus.google.com/+guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_googleplus',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Linkedin', 'cabana' ),
           'desc' => __( 'Enter your Linkedin Profile URL <br />(ie; http://linkedin.com/in/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_linkedin',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Pinterest', 'cabana' ),
           'desc' => __( 'Enter your Pinterest Profile URL <br />(ie; http://pinterest.com/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_pinterest',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Dribbble', 'cabana' ),
           'desc' => __( 'Enter your Dribbble Profile URL <br />(ie; http://dribbble.com/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_dribbble',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Flickr', 'cabana' ),
           'desc' => __( 'Enter your Flickr Profile URL <br />(ie; http://flickr.com/photos/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_flickr',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'Vimeo', 'cabana' ),
           'desc' => __( 'Enter your Vimeo Profile URL <br />(ie; http://vimeo.com/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_vimeo',
           'type' => 'text',
           'std' => ''
        ),
        array(
           'name' => __( 'YouTube', 'cabana' ),
           'desc' => __( 'Enter your YouTube Profile URL <br />(ie; http://youtube.com/user/guuthemes)', 'cabana' ),
           'id' => $prefix . 'member_youtube',
           'type' => 'text',
           'std' => ''
        )
    )
);

$meta_box_team_overview = array(
	'id' => 'gt-meta-box-team-overview',
	'title' => __( 'Team Member Overview', 'cabana' ),
	'page' => 'team',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __( 'Skills List', 'cabana' ),
			'desc' => __( 'Enter a comma separated list (ie; Illustration, Photography, Motion Graphics)', 'cabana' ),
			'id' => $prefix . 'member_overview_skills_list',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Equipment List', 'cabana' ),
			'desc' => __( 'Enter a comma separated list (ie; MacBook Pro, iMac 27", Sony A7)', 'cabana' ),
			'id' => $prefix . 'member_overview_equipment_list',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Likes List', 'cabana' ),
			'desc' => __( 'Enter a comma separated list (ie; Nice people, Movies, Hardworkers)', 'cabana' ),
			'id' => $prefix . 'member_overview_likes_list',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Dislikes List', 'cabana' ),
			'desc' => __( 'Enter a comma separated list (ie; Rude People, Bad Weather, Celery)', 'cabana' ),
			'id' => $prefix . 'member_overview_dislikes_list',
			'type' => 'text',
			'std' => ''
		)
	)
	
);

add_action( 'admin_menu', 'gt_add_box_team' );

/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function gt_show_box_team() {
    global $meta_box_team, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="gt_add_box_team_nonce" value="', wp_create_nonce( basename( __FILE__ ) ), '" />';

	echo '<table class="form-table">';
		
	foreach ( $meta_box_team['fields'] as $field ) {
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

function gt_show_box_team_overview() {
    global $meta_box_team_overview, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="gt_add_box_team_nonce" value="', wp_create_nonce( basename( __FILE__ ) ), '" />';

	echo '<table class="form-table">';
		
	foreach ( $meta_box_team_overview['fields'] as $field ) {
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

add_action( 'save_post', 'gt_save_data_team' );

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function gt_add_box_team() {
	global $meta_box_team, $meta_box_team_overview;
	
	add_meta_box( $meta_box_team['id'], $meta_box_team['title'], 'gt_show_box_team', $meta_box_team['page'], $meta_box_team['context'], $meta_box_team['priority'] );
	
	add_meta_box( $meta_box_team_overview['id'], $meta_box_team_overview['title'], 'gt_show_box_team_overview', $meta_box_team_overview['page'], $meta_box_team_overview['context'], $meta_box_team_overview['priority'] );
	
}

/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/

// Save data from meta box
function gt_save_data_team( $post_id ) {
    global $meta_box_team, $meta_box_team_overview;

    // verify nonce
    if ( !isset( $_POST['gt_add_box_team_nonce'] ) || !wp_verify_nonce( $_POST['gt_add_box_team_nonce'], basename( __FILE__ ) ) ) {
    	return $post_id;
    }

    // check autosave
    if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
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

    foreach ( $meta_box_team['fields'] as $field ) { // save each option
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ( $new && $new != $old ) { // compare changes to existing values
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    }
    
    foreach ( $meta_box_team_overview['fields'] as $field ) {
		$old = get_post_meta( $post_id, $field['id'], true );
		$new = $_POST[$field['id']];

		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $field['id'], stripslashes(htmlspecialchars( $new )) );
		} elseif ( '' == $new && $old ) {
			delete_post_meta( $post_id, $field['id'], $old );
		}
	}
    
}

?>