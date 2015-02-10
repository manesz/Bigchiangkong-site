<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'web_bigchiangkong');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3|:3cn-d>LjI=y!B?B7~@u}Q^tkQ=#3]oD2a1q-qsad*u)Cc8E69lS:7Ku$@kA--');
define('SECURE_AUTH_KEY',  'UW~rpz?sQ|@LkOKqwk5MZ3C$<oVQT|]]xedK7t`KG-s8/ocSU$TKG/v/3nSzL|j$');
define('LOGGED_IN_KEY',    '<x.d DS$[[p_!s(<e`F>5-4+UG6zm6/I,+eXs^>/?_vUw24 Gm<>{]@B#QwVK|um');
define('NONCE_KEY',        '4bOYPp.+IEj;~_,V0Oc/@tCj[Jo(rB{F)Wg|+Et.s57U}stq^^xqLfq=@[rng:x@');
define('AUTH_SALT',        'rcFMoT{Nq&MnBIdj+bspk.#5ocNGti9!JhBi[*5l>q$HQkc*,p,w5ZnRJ | oy-(');
define('SECURE_AUTH_SALT', 'ltYXO>Vl||y?}+iGPo^pr5.,1dfTSmW{%fZco8HMG9 =e/3D+RmW>l-9M&A!d2@M');
define('LOGGED_IN_SALT',   '4|3gE(0L3g<-2d&1bF,<@X(6)(@]{67fAa}r=8|`7pL?}:)HTlfZHH}ZtBe2-D~y');
define('NONCE_SALT',       'iVKvL~#W_2U}=<@x<z|zy7/fW{/zMM+bNB|~{h|sVT CT|hLc$veKYUcELO$$F)v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
