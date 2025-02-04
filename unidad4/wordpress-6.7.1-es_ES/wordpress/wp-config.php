<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'a ?:f~B:F0H;mU3{&PA5|.H}D%aR;`+l(JF@&zqI YB_-x_k|K#`vT~?M,j5-v[n' );
define( 'SECURE_AUTH_KEY',  '1&;J;A)`f%E<aV+a6d@ZB?(A4Ik_;k>s/IRTH~G,?S%JG#m*|Q Mw~QF;< t^lE;' );
define( 'LOGGED_IN_KEY',    ':weh;~Ew_H,73Om~1h h;QgGCRZ%~+x@w:I~^nRw:75LbUA*PfUt!pG{5CC_:k6N' );
define( 'NONCE_KEY',        '?*K;k|v=aMxE/Hd@.~2<bl^ V3WsEo,K.Bc>H_|GEnYpccQ|Ndl/xu: Nr6qB;J}' );
define( 'AUTH_SALT',        ':P8KJeYSg$->D|mJDyLIMtSM?8!d=.UFLXG9U~cH4e62MK0L _dis<i*t^v$*%$,' );
define( 'SECURE_AUTH_SALT', 'd:Ig9x&*$&a-S{X[`;$/A~MkV(E:GqvlZgwlRJ`W2iI,k;n7@O=4Uf,tPn?!Ma,d' );
define( 'LOGGED_IN_SALT',   'k0L{|G^odWv^61!nFhra]#>^?g(4c2Jb+>BrO4ff8/u0qy`qv0;4_-k;}=67U!<?' );
define( 'NONCE_SALT',       '-k8<^$]kH7f-q.ezr,.61dlLB0q$gwe;{0<0 G?Rhm{L=V$pE^a%^+j}eMVXj]Tl' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
