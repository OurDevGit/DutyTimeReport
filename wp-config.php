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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_officerDuty' );

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
define( 'AUTH_KEY',         ':&p9v-O;g(KP:c2&*j.s-8S4Jp`:]>fnB*DGJHp3_ltElMKxa}no+OfvLPFw#%.-' );
define( 'SECURE_AUTH_KEY',  '%/L>te[>4abyMO-cjwb1yU`p`Yw=GMSlt66$lMom ph5mK<fJFF-w`a5W5*&iZpc' );
define( 'LOGGED_IN_KEY',    'u|A.IxMGgpV$O_QfQRdvu,A2.454pNh!lUs3`bL@SpS%0{>,.m1r~,>/uu,q%&;3' );
define( 'NONCE_KEY',        '[>9gZFja]k#p6G|QHJ!@G1]?:c_3? iG0k$e`i-`(T8v}A0e1C[X8RTyb](uXVEm' );
define( 'AUTH_SALT',        'rCi~pDgmRmH{jK|]9/HiG>]f4n>c1xZ]dw*ZLmwtz]cH4]JU0v{nC?:U7wLlkWZ/' );
define( 'SECURE_AUTH_SALT', 'LBZ,[^w-dl!U,XUSYmD+9dV4424+Xa7bp[_3ZWy^E8YdV3<I leypEGF)/jO|NXf' );
define( 'LOGGED_IN_SALT',   'b_fdlg_l RF-0L{>]}2|U/X*[_e-FkaIfEkDy;/Q90Ql7BD0>9 5]-X!L5wLPIz)' );
define( 'NONCE_SALT',       'scfqb,KUe6Emf;pW9RVC6$CBP}TG5z0Mzw@f7eVfB%`sgRtx/WTti/3UlkIa]Zh0' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
