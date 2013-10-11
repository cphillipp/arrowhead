<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
if (isset($_SERVER['PLATFORM']) && $_SERVER['PLATFORM'] == 'PAGODABOX') {
    define('DB_NAME', $_SERVER['DB1_NAME']);
    define('DB_USER', $_SERVER['DB1_USER']);
    define('DB_PASSWORD', $_SERVER['DB1_PASS']);
    define ('DB_HOST', $_SERVER['DB1_HOST'] . ':' . $_SERVER['DB1_PORT']);
}
else {
    define('DB_NAME', 'arrowhead');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_HOST', 'localhost');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&;-R)|/4Z)GRSiw;W1u<(SmQ^D3+0gG,|7~Jpp}?rt<,Ah*f*>hb9>hya+HMnYHC');
define('SECURE_AUTH_KEY',  '.vCUzwxPogI/au9cB%*6SRX@*]mw+KzL5a?>B$H!S=-u?c;S+2c%!-j`!@{e&ixJ');
define('LOGGED_IN_KEY',    '4q=%&!ol+02Ss|EU/||E0K)KZpCKJMs&4[o`|s5Is;}t5DAt2gWFjCJIg~(1A=JZ');
define('NONCE_KEY',        'BH${ZvJ->:R%H:oarGs+ LwhY];M%bT5|p!eX0-V;hK<B? cjb-NT[&!l^j~?XX.');
define('AUTH_SALT',        'M8L./cIZ,`HbQs?MR%)Z+2Ij -[,@5A,-wt{Y|ao%p1kERYSQ=6-gL-PTEO_:<0R');
define('SECURE_AUTH_SALT', 'G[;o2X(NB?krZM]ejK#y}aP|eXM~|5[E2:z`*|[0YZL<.v=hft3@/uz0%<z;|F[@');
define('LOGGED_IN_SALT',   '8aI}+GmQ7F(^+k>&-n{b)+:0^dK795ApFAj*@$@=mgHs(*TV!o$jp+1IWu9v)VH+');
define('NONCE_SALT',       'wFSPktJ8!!,PR]}ft#p%o,rw+(YR^M-95M&~iA YTr4*Q@3CLG6wOH!$_Yzlh}zy');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
