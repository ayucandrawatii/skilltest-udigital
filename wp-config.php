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
define( 'DB_NAME', 'udigital2' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ',mA:rxf@_F|{62}Z3VVcQ;Yk.MY6~u7fjH&jj~#m,[}YByE6=|{[h&GZx/?hF:DI' );
define( 'SECURE_AUTH_KEY',  ';r{OXLN5KmdGqZy74;&Epu;kU7hSka5[xbPrW-{@ck2QGxiz|#Uve;Kdc|m26Def' );
define( 'LOGGED_IN_KEY',    ']lvfsYM;@{{_G$7p9ai%wg]3^nut)YlAqw=>^-rUwq>Ip2;0PJ<II/^&fGF%$Xy]' );
define( 'NONCE_KEY',        '-=!H,bm[&cr{5*Les5td~1dnlD2OpT+jK|23#Vm`uny7Pim!F=__#y|qaYBD&OW[' );
define( 'AUTH_SALT',        '5tE8H0U84Rty#+OTG8by?*$ZT=i.-lz9{>Er/ip]n=87#Z(#<@.X.~ k@B21(n<c' );
define( 'SECURE_AUTH_SALT', 'F;D-ICPLfsHyWR4q~18B#2FC6gB@EoInI8W7P<JGcf%sNy$agN*l6k!i@>ru3cuf' );
define( 'LOGGED_IN_SALT',   'TiquEjpyGEhd:Vwe(m`Q?k:!7y%3uEQD`faiw:Tk]7+6%Q[]8}a(77guj=~)f1p|' );
define( 'NONCE_SALT',       '{Ah]3a[tHKBpbo/^]6x$F-&[UpYJ;Do*k,S=pwyepT[$UiYZ/!lLkYK0rV.+}>FG' );

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
define('FS_METHOD','direct');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
