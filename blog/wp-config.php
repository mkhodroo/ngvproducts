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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ngvproducts_blog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'h<tDIk}kTa8A&,&:H0H`SSMKAbu2-9-U37to>BU>}e{XKi&DZ4?o&R!o)6Aj$5a ' );
define( 'SECURE_AUTH_KEY',  'X:|!Z|?Q7I+t&qWBIU|s{,ghDpK8O{Ad|;JS;d%}i!wdH12-w3F`EH0,I=[`AnEe' );
define( 'LOGGED_IN_KEY',    'Z&$BsciXoAAGcC!zhp,tC$VcKf^by9g,bCU|f G@8l:6E0MPIT =cH(5jP;5T[I|' );
define( 'NONCE_KEY',        ' ^a+LpT!yEUUYJz)]75EH[9ma$X@1%9I,)=)Hkl.uk+*RO mB[(*Kvvj[Ye~ V<3' );
define( 'AUTH_SALT',        '[7 M(D[&Gf0#IpM,J<<X_s?% F&:g!f @`Mi78F|9Fs{#!B.d?=;|4q%6{S(!hoU' );
define( 'SECURE_AUTH_SALT', 'E^s!PNQrVQ~+/J449YY)i`FW4Jgef4cQ%cHQD:K%d/==`Hx8o8uO~!#G6d76J2R#' );
define( 'LOGGED_IN_SALT',   '0C[d-(zEwZ=_TU>jyg?V+~AAA3NnLq#C>vda`1HH1(OV<f}!iM,c()MKuD1gYxCa' );
define( 'NONCE_SALT',       '^Pe&##.(o*~+ySiTk3ua%qLIMj#/uNoDd;<1&QDodJs/[Jx:k`g<xz(]{.kU}$M0' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
