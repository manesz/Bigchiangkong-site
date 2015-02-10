<?php
/*
* Plugin Name: GT Shortcodes
* Plugin URI: http://guuthemes.com
* Description: An awesome selection of shortcodes from GuuThemes.
* Version: 1.1
* Author: GuuThemes
* Author URI: http://guuthemes.com
* License: GNU General Public License
* License URI: https://www.gnu.org/licenses/gpl.html
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Adds plugin JS and CSS
require_once( dirname(__FILE__) . '/includes/scripts.php' );

// Shortcode functions
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php');

// Adds mce buttons to post editor
require_once( dirname(__FILE__) . '/includes/mce/gt_shortcodes_tinymce.php');