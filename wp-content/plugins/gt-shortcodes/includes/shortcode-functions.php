<?php

add_filter('widget_text', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Skill Bars
/*-----------------------------------------------------------------------------------*/

function skillbar_shortcode( $atts  ) {		
	extract( shortcode_atts( array(
		'title'			=> '',
		'percentage'	=> '80',
		'color'			=> '#333',
		'show_percent'	=> 'true',
	), $atts ) );
	
	// Enqueue script
	wp_enqueue_script('gt_skillbar');
	
	$output = '<div class="skillbar" data-percent="'. $percentage .'%">';
		if ( $title !== '' ) $output .= '<div class="skillbar-title" style="background: '. $color .';"><em>'. $title .'</em></div>';
		$output .= '<div class="skillbar-bar" style="background: '. $color .';"></div>';
		if ( $show_percent == 'true' ) {
			$output .= '<div class="skillbar-percent">'.$percentage.'%</div>';
		}
	$output .= '</div>';
	
	return $output;
}

add_shortcode( 'skillbar', 'skillbar_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Pie Charts
/*-----------------------------------------------------------------------------------*/

function piechart_shortcode( $atts, $content = null ) {
   return '<div class="chart">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'piechart', 'piechart_shortcode' );

function piechart_inner_shortcode( $atts ) {
	
	extract( shortcode_atts( array(
      'percent' => '100',
      'title' => 'Title'
	), $atts ) );
	
	// Enqueue script
	wp_enqueue_script('gt_piechart');
	  
   return '<div class="percentage" data-percent="'. $percent .'%"><span>'.$percent.'</span></div><div class="label"><strong>'.$title.'</strong></div>';
}

add_shortcode( 'piechart_inner', 'piechart_inner_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Blockquotes
/*-----------------------------------------------------------------------------------*/

function blockquotes($atts, $content = null) {
    extract(shortcode_atts(array(
        'cite' => ''
    ), $atts));
    $blockquotes = '<blockquote class="large"';
    $blockquotes .= '><p>' . $content . '</p>';
    if ($cite) {
        $blockquotes .= '<cite>- ' . $cite . '</cite>';
    }
    $blockquotes .= '</blockquote>';
    return $blockquotes;
}

add_shortcode('blockquote', 'blockquotes');

/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/

function accordion_shortcode($atts, $content = null ) {
   return '<div class="accordion-container">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'accordion', 'accordion_shortcode' );

function accordion_section_shortcode( $atts, $content = null  ) {
	
	extract( shortcode_atts( array(
      'title' => 'Title',
	), $atts ) );
	
	// Enqueue script
	wp_enqueue_script('gt_accordion');
	  
   return '<h2 class="accordion-header">'. $title .'</a></h2><div class="accordion-content">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'accordion_section', 'accordion_section_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

add_shortcode( 'tabgroup', 'st_tabgroup' );

function st_tabgroup( $atts, $content ){
	
$GLOBALS['tab_count'] = 0;
do_shortcode( $content );

// Enqueue script
wp_enqueue_script('gt_tabs');

if( is_array( $GLOBALS['tabs'] ) ){
	
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a href="#'.$tab['id'].'">'.$tab['title'].'</a></li>';
$panes[] = '<li id="'.$tab['id'].'Tab">'.$tab['content'].'</li>';
}
$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><ul class="tabs-content">'.implode( "\n", $panes ).'</ul>'."\n";
}
return $return;

}

add_shortcode( 'tab', 'st_tab' );
function st_tab( $atts, $content ){
extract(shortcode_atts(array(
	'title' => '%d',
	'id' => '%d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array(
	'title' => sprintf( $title, $GLOBALS['tab_count'] ),
	'content' =>  do_shortcode($content),
	'id' =>  $id );

$GLOBALS['tab_count']++;
}

/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/

function one_half_first( $atts, $content = null ) {
   return '<div class="one_half first"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_half_first', 'one_half_first'); 

function one_half_last( $atts, $content = null ) {
   return '<div class="one_half last"><p>' . do_shortcode($content) . '</p></div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'one_half_last');

function one_third_first( $atts, $content = null ) {
   return '<div class="one_third first"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_third_first', 'one_third_first');

function one_third( $atts, $content = null ) {
   return '<div class="one_third"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_third', 'one_third');

function one_third_last( $atts, $content = null ) {
   return '<div class="one_third last"><p>' . do_shortcode($content) . '</p></div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'one_third_last');

function one_fourth_first( $atts, $content = null ) {
   return '<div class="one_fourth first"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_fourth_first', 'one_fourth_first');

function one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_fourth', 'one_fourth');

function one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last"><p>' . do_shortcode($content) . '</p></div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'one_fourth_last');

/*-----------------------------------------------------------------------------------*/
/*	Pricing Tables
/*-----------------------------------------------------------------------------------*/

function pricing_table_shortcode( $atts, $content = null  ) {
   return '<div class="pricing-table">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode( 'pricing_table', 'pricing_table_shortcode' );

function pricing_shortcode( $atts, $content = null  ) {
	
	extract( shortcode_atts( array(
		'column' => '4',
		'class' => '',
		'icon'  => '',
		'title' => 'Title',
		'price' => '',
		'per' => '',
		'button_url' => '',
		'button_text' => 'Sign Up'
	), $atts ) );
	
	if($column == '2') {
		$column_size = 'eight columns';
	}
	if($column == '3') {
		$column_size = 'one-third column';
	}
	if($column =='4') {
		$column_size = 'four columns';
	}
 
	$pricing_content ='';
	$pricing_content .= '<div id="pricing-plan" class="'. $column_size .' '. $class .'">';
	$pricing_content .= '<dl class="plans">';
	$pricing_content .= '<dd class="plan-title"><i class="fa '. $icon .'"></i><br />'. $title. '</dd>';
	$pricing_content .= '<dd class="plan-price">'. $price .'';
	if($per !='') {
		$pricing_content .='<span>'. $per .'</span>';
	}
	$pricing_content .= '</dd>';
	$pricing_content .= '</dl>';
	
	
	$pricing_content .= '<dl class="plan">';
	$pricing_content .= '<dd class="plan-features">';
	$pricing_content .= ''. $content. '';
	$pricing_content .= '</dd>';
	$pricing_content .= '<dd class="plan-sign-up"><a class="sign-up-btn" href="'. $button_url .'">'. $button_text .'</a></dd>';
	$pricing_content .= '</dl>';
	$pricing_content .= '</div>';
	  
   return $pricing_content;
}

add_shortcode( 'pricing', 'pricing_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Dropcaps
/*-----------------------------------------------------------------------------------*/

function dropcap( $atts, $content = null ) {
	return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode( 'dropcap', 'dropcap' );

/*-----------------------------------------------------------------------------------*/
/*	Styled Paragraph
/*-----------------------------------------------------------------------------------*/

function styledparagraph_shortcode( $atts, $content = null ) {
    return '<p class="first-paragraph">' . do_shortcode($content) . '</p>';
}
add_shortcode( 'styled_paragraph', 'styledparagraph_shortcode' );