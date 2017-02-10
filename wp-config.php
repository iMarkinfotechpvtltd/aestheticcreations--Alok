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
define('DB_NAME', 'db663623370');

/** MySQL database username */
define('DB_USER', 'dbo663623370');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '$s#+XYI-Lt`i&8+u6z%FLe$^u0&kC4+HA9$Y_x^3U*UF)Byr.VBj*3EvEjED}UxT');
define('SECURE_AUTH_KEY',  '$crABYNV4G]IXgU<.o!tw+k>f =[5t1~*/y?^z3(^oK<ATDB8yD2x5_uojhi|Q;p');
define('LOGGED_IN_KEY',    '~S-S}p95HFw*Uw,xI-A8^M@-Vs:<u&QR@wH}dCYRhlUo./5C.q9bkRwIc@D&_TKH');
define('NONCE_KEY',        '#VD>Ik9-yP6E H[fQzQRex2t7ecT]}V@_jE2dh`.7]~}vD{^=5GS;J.m/p id13x');
define('AUTH_SALT',        'aDoy=G5t:6ri/K1d!ePMWq@3K=tjOK_x-v_!gXn5Dri=so=JCy)yr IXTs>%h#UA');
define('SECURE_AUTH_SALT', '!Oz9m).3(IvE~MZ!JX$zxfYVH+(7-/=d4At-uLoz0l,I8sdbB+MI$+qfK1F~FzsR');
define('LOGGED_IN_SALT',   'm#cEz+lx1y0AiH3B878UnsAauamP-cb~i/&`My#^+lk YDPy#kgZ>VY3KUDf@-aj');
define('NONCE_SALT',       'wZoHGwV=N{t:a|sE[f~s?Q/)Z0=Z3#>uxg!9J5F7k1eflHD~qr&Bwrvz+4#v(0<*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
