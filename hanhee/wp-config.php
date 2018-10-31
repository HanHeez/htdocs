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
define('SAVEQUERIES', true);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'Iloveyoyo91');

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
define('AUTH_KEY',         '[Zf]+#(M*}1tF?6Ab8O`Q5.zoDf;LuMt[4[P3:J$y$1VE|J&Cns>mq`%%7!Q31g?');
define('SECURE_AUTH_KEY',  '5b!}j,v{#{}6L,/CU@;L =A-}4[bXIQ4{Iq !1Chh=VmWfKp};n0%oB@hwpXxsC_');
define('LOGGED_IN_KEY',    'e{F3>XJxi)Ba$Raos4I]}.E^?zmsa;PU:/#y=:@ v?:d]}zeUS2;[R7WgchtBfiy');
define('NONCE_KEY',        's 5m_NeelZ8`>;Auo^o[_Zt8wPTjbzO2-$mlnUwL4ml+Skr,N@74R@co~**2^-4d');
define('AUTH_SALT',        '~8qy/WAh9RBZk_&&t<d`{3L8SW><>+3JyF$)`r(/p8RjCo}dOIcZF,GZG9wOxs7E');
define('SECURE_AUTH_SALT', '8@Kgiu?FLR5e~yDbioYRR3!e=cjZ$+*JCu*sdq66[RJtJdO NG+=Wa&(|$.--@Ow');
define('LOGGED_IN_SALT',   'L2r9Mgr:l!e:A7sM&i*fK~rd={3UBhd8XAT$3v%IoIxB8{O4>tW_2[i,%{b8b_?6');
define('NONCE_SALT',       '?;>1/wpj`7gfR=N;g&)8]>LEwfC;t%,6!(;h^[K|Q5kO![}kcfTQ$JyD_%d2-v:!');

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
