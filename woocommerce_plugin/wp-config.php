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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'my_task' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '.xaq}pgig;Ful%XWTI%.gad:G!n@V,P?G%y7I=}kNw3,dMCU1<XRw,)=oGY=Y#rA' );
define( 'SECURE_AUTH_KEY',  '/nUDH--T8s680;P]<<Y%Icml EOE>T.&a?tVmkM`g fV~:S!]T`PH:Oir$>_QmeT' );
define( 'LOGGED_IN_KEY',    'P1bc)CQKOE-m4<~bQ}3.5LZ+aDO_D/5R`H+7q1G&b>&@*XrWSI_<,CO])fp2D?h}' );
define( 'NONCE_KEY',        '`M/k3%}UVP)FH#a>k~u+Gc:!]4d>j,`t5Um&2I!Yk|+XPQHJ6&U[At%+mj~xQLEf' );
define( 'AUTH_SALT',        'L=#[#G*+WKK+~p&V9ZHL#+9_KsjFTdWr[Lo-FuLah-&Y|^@ @>bdNc`YnQOO0~g.' );
define( 'SECURE_AUTH_SALT', 'kAa.ann48PK RvvKNS,9hW=P>L0/^ ]FMD=k u9!,s{a9;>quS]+s.*tRtV+&NO)' );
define( 'LOGGED_IN_SALT',   'K<paTeAk6^k><U>PABrqbV/cV~5a*#K/Wi&:Z lOvRa@?9k+9NZezNs*b9>GL/%W' );
define( 'NONCE_SALT',       'D1Rcfj$g)&k4_uqZ4HWG ]&22SY$0A@Jdd0iGQ>qc>6(&kf*:u8a^@tiA/7XeEQJ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
