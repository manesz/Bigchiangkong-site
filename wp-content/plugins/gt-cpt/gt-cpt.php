<?php
/*
* Plugin Name: GT Custom Post Types
* Plugin URI: http://guuthemes.com
* Description: Theme specific Custom Post Types.
* Version: 1.0
* Author: GuuThemes
* Author URI: http://guuthemes.com
* License: GNU General Public License
* License URI: https://www.gnu.org/licenses/gpl.html
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Register Portfolio CPT
require_once( dirname(__FILE__) . '/cpt/portfolio-type.php');

// Register Services CPT
require_once( dirname(__FILE__) . '/cpt/services-type.php');

// Register Team CPT
require_once( dirname(__FILE__) . '/cpt/team-type.php');

// Register Quotes CPT
require_once( dirname(__FILE__) . '/cpt/quotes-type.php');