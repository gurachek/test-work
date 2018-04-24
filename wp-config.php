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
define('DB_NAME', 'test-work');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')%(5Vi@UxI+c%0>1aWk3~/N1R[8[5S?7n TFhl4sgr8(BRLpOce^$fzah(t*[@9X');
define('SECURE_AUTH_KEY',  '>~YQe_Ckdsx~9<WLZ#o)VS6,sLOAGuVz3D~23b}j#tL:Eo__+=3jnZp+3lzpd bk');
define('LOGGED_IN_KEY',    'U1,9NJ>YIt;21dH!jT-0{pBPm<f0e6btXDao5K}`sHAgRZWCVLSo3Xw!Yei?J6.E');
define('NONCE_KEY',        'uz]UGzCGF2sF^CNx&(4tRL;Z08Q$/K=#6GBf?QIO,r_v<}L/50_R&x|p|G,S a{u');
define('AUTH_SALT',        'G| $w<ILBY2Lam1Co9{pex/$c;Id5%,1t7T2^qOmrE2TL2jsIZX7hY]21.F,t5*;');
define('SECURE_AUTH_SALT', '+tompSyagtv#JQ9!PdH@c$C(lBJ}xUyT~J{sRvG0!?K5XsF9/$sc|O*sTr4a>1A-');
define('LOGGED_IN_SALT',   'A5j9W5C$B+zJec9BwY$u-r<>~Ujd*s@KID@;FgI+fF]`1}#s0`$rVVBPuhuIpHgm');
define('NONCE_SALT',       'L$u.dFg9:Z-6OFUPUaoGv/tW|yzN-O$5MU8^h`K+0Bjk(@Pncsi<X^{:h<5F0Adq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
