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
define( 'DB_NAME', 'wordpress_phamlongvu' );

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
define( 'AUTH_KEY',         '[iQ~6ZRfHU$Q+,SlPLXLi[#~H`u0pZ_b7M>dk;XC(WHhFZkipsP5A~UHbO>Hg/&6' );
define( 'SECURE_AUTH_KEY',  's)ko8r?E|]+d43?og?l1p>g6mC9x sG41wyT#=)UkcA5%YC~&UN@cScwwoH+^oAc' );
define( 'LOGGED_IN_KEY',    'wzM/b?AW:]nE&ehe%`>r$6i(=F*f@=F<uguW?(oks-An;f8pNyjz+1 ld78WHSl&' );
define( 'NONCE_KEY',        'rpzhY7lP-6a}Lz&hTHc5pJhl{9:k1/^:Cx$2o%#[SOMVl)ioU609z%.Q+?kavMYI' );
define( 'AUTH_SALT',        'La=v^kiU vnfOi^$cN(|iwZ%79|tQ2t/@ 2$aSR[_<Wb^0JKenTpW-/duEFH}%mQ' );
define( 'SECURE_AUTH_SALT', '(9 AXWc_;s[;KDc2JtZU6tRU*%RhRFid`(@x^mKRGVG:NvgU-^f yK)gPQ ciA,w' );
define( 'LOGGED_IN_SALT',   'u zkt2&jqStuK;O}5]+cSnrC_K?$.]eq~Grfr%-Br#)MOAgeSfhe7{+TfjCvxGt*' );
define( 'NONCE_SALT',       'cphf8uDMq5Q`^9PLJabwz$1PTx^r=Y(0cg@&S~(nS=>0i0u&9kHnJnY7t3*O,um?' );

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

define('WP_HOME', 'http://wordpress.local');
define('WP_SITEURL', 'http://wordpress.local');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
