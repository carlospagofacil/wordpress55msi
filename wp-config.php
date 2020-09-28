<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\wamp64\www\wordpress55pf\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'wordpress_55_pf' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&=z#m|b/|1L&j.sV[k5@c-LAW3VTLxk:1R%I@i/Ykm8cev!op2:{XLv.5^~|yREF' );
define( 'SECURE_AUTH_KEY',  'L%l:QXr5{u<YXEyN!*^TUZ_FLsG6V1Ec+eX8*D2 m!JL*.+mx#iA6W:x5y_?2@:)' );
define( 'LOGGED_IN_KEY',    '}1&Lt{VeHD&q8we.FMxPsnik.HB]fXy{c%FB616@)<E9Jl*C--:Z2i(qK}PNZ+u)' );
define( 'NONCE_KEY',        'O;f5b2hB fc:_B=9U/j_>[|He9BL_6brU G13Pj_!moL42q4aN#@0]BDmH28`)J6' );
define( 'AUTH_SALT',        'd]UUl^c?3<#4FUbwI||)`nP4]tz^cR?_D19Q#tf[k;so1rq-JJX`.k0_:X2d:>vc' );
define( 'SECURE_AUTH_SALT', 'Z!e4{VLx-iFns%5aXp&$2N2rv3RoPGx]3eBO3J0yHX+/>lCNuMLMEZrF}N-I4x)&' );
define( 'LOGGED_IN_SALT',   'dHUnRPfgm6XtDNR:4y3-KbmH?P;nugL%H JH]{&o7Xj( s=b:[bk(3_?`tD[ts<u' );
define( 'NONCE_SALT',       'gB| OE{i2`H[@U$cRQ_G:`>6%8F:2c|T,#>s:#V`L?+=emzECPVJFaD,QKks#gx6' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
