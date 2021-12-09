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
define( 'DB_NAME', 'db_alexwp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '50ee9055' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '8rxB<HKh2DJV`S~hNkx##Tu9GW{xFyuFZxqz?CLNK#1^O@.u!( mQ)RS[Gagi0Yv' );
define( 'SECURE_AUTH_KEY',  '7rhQWw@s-! A~JM^y2f|P.z;*wRsG*Unlb(h:FAm|7dHi%BCl!it,iK _P2qq-c+' );
define( 'LOGGED_IN_KEY',    '-&F;qp<3C4!ojKn.^)gh $5Z %sIK|fSXI^<OP!cFrp{F.aW0F yQ_83wMemvb[-' );
define( 'NONCE_KEY',        'phArj?/KSwE/Y+q0>oIpex#]H9Wy5B,J%&[jBq;;NKe pQD_+e.^G2.;O5@6}yGZ' );
define( 'AUTH_SALT',        'MSnBYh4D4{BpQvty&7e:R6Z_M`=CT7<V|EFf8%.On70WIEkQWO*e[tzx}O% OG8T' );
define( 'SECURE_AUTH_SALT', 'rKA1N&m8`-3FoPQ,p,izwHM4L0yr,Dh?wSaeAwTl~@S!cS-z[vtW dS]2Zdbz3a*' );
define( 'LOGGED_IN_SALT',   '%[iNkv1$(|?]`~P[qBD5zpcJ)69&oxXUYpHD/Fwbpjou*Dox$%sk`$MnVLd>n@p&' );
define( 'NONCE_SALT',       '#Re,S@4ZAW10%e*Th0A,shf.U-ZNlQ[TQWGNNyN7Pb+wwG3EeG-<tOb](j.v/cjV' );

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
