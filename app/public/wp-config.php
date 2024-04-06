<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '%P-jBiBO]UK7J-|c_6[iiD65+ywhfD nqA50tS8s%-rsA&_uA<=j@m}XA*w33_w5' );
define( 'SECURE_AUTH_KEY',   ')#%afz1=TS5t0[v(k6EJ%n!<>G@]r=7Gw,Yd4]z8.D<ONLtK]_W:!E9z}W=YFH.+' );
define( 'LOGGED_IN_KEY',     ')%`bhnT+ )`jZiW:*4,GY?8f`IL!cc!w*B7{MFox8gE+W2n;Zd`eok8~8-D@9^L8' );
define( 'NONCE_KEY',         'S%+&OYfyI-FFCca.l|?bRS|O3k1uYyl!1hc,fbCwh8R-F1n0vr$!:p]~aAnX[JJH' );
define( 'AUTH_SALT',         'k1{!_$5iTzv`CW]}egr#;VemMtoY_#AtR_W73D:95@ta+@QE;z.!9p8*Y{F3_e+(' );
define( 'SECURE_AUTH_SALT',  '8VfZ>^f[Oo]K<pN1Gxq{>&E7j3f9S9`J)0IGZ^#;zB7-`-o.5y1,9]gp&T{.HrU&' );
define( 'LOGGED_IN_SALT',    'Y3E&kn!s!pq+u{Z&#Y(;+qO>RP<@cSRq![437 QKIe^i~I=JW+toI3Lnz~%s]uJ`' );
define( 'NONCE_SALT',        '+45du8P*K_G;x#oX;Qh1~c?!-`uio~w^JZ-4*. $zXCgLx;Kc`qrRqRwSn/gAGgO' );
define( 'WP_CACHE_KEY_SALT', 'A)v4CUW-d?$#}h83:ErJM7uHVhk}w,0cMI;$te8a+`W2WR`0+J!X+,_@)W^8:co~' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
