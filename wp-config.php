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
define( 'DB_NAME', 'whitewaqyin_wesrom' );

/** Database username */
define( 'DB_USER', 'whitewayin_wwwin' );

/** Database password */
define( 'DB_PASSWORD', 'www79&(' );

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
define( 'AUTH_KEY',         'e5:0X@r0=-Lw8t?bQE$^L:]4HT8yl<[NaXKy(_rU>>uST*h_6P>AA9CFofn&EFSS' );
define( 'SECURE_AUTH_KEY',  'xP4DmJ_?1@ZSFM@y4th0ul|;^z+Kk]?G(eX7hL@F3(ujl6`+?(mOta[$2Pg8gH],' );
define( 'LOGGED_IN_KEY',    'H_`#@e{dH-gs k$@f>0RP!?j~7-OQtgIp7UD(w2|/)1NH(xN$!fui0)26w?+cS.`' );
define( 'NONCE_KEY',        'M^M?Nl>cIXo+>~*G+ivF>Y|[& 1&L7#ad=*SrxyyX;e=x@qW^:/y))r9FWT!5_sI' );
define( 'AUTH_SALT',        'Sa{Lv;sorqMX2v36wmUBpPo4[X g6>MWpwz-W+gXz=YH).31<TZMgBSukO4&Qt?g' );
define( 'SECURE_AUTH_SALT', 'b6aR 0i;xkJ_tCF5=1HZe+*S30;EOb^Qc[a5lJE9gWSk/@k~>1YP^>NhNO&{t1v^' );
define( 'LOGGED_IN_SALT',   'QV6X L;cd,`<.bL3?;k.D1n%f{r;cuuSJg]=%U:1a;%%ZVts%cS`{OT22lyJFO`f' );
define( 'NONCE_SALT',       '^16es.[T]{)`3.C]!2n1V{VHrEt<N5Zg=AYc 1NIu:PVI[_RV1c!pUvw.`v?g^93' );

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
