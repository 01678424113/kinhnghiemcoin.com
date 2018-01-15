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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/kinhnghiemcoin.com/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'kinhnghiemcoin');

/** MySQL database username */
define('DB_USER', 'kinhnghiemcoin');

/** MySQL database password */
define('DB_PASSWORD', 'kinhnghiemcoin11');

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
define('AUTH_KEY',         'a`zn;DS, ZIuRn[tj]fkj%l&gg(jHv_HlE}UF(>wCH;%VzcZx]j*I?YRnw|<Kr_j');
define('SECURE_AUTH_KEY',  '#p+[=LE|Wmw_{[Rg%a{qLK+x(;M6+kECaj>Lm5gT.WfuX8yd_2UT|H8nwH{Sr<!.');
define('LOGGED_IN_KEY',    'TE]+G:^C.6-}<2VcU^/i/HAY~F_y|37Jd[M]z0aywxpa+airBlS+ry6bT9!Ew)mz');
define('NONCE_KEY',        'vN=q9T]%^*+#8F>1z|l%3ik k06$hx;My7t`bM:1PXi)>]R0Xs_U_chC&--3,5VJ');
define('AUTH_SALT',        '$%}ExWy8gs YpwV/^S5|(C[3y cj+?$CG1,x>`_dg1ZM[1L_V,>V1`h8;vkLS1z]');
define('SECURE_AUTH_SALT', 'Q7k6F9D ^X!o9<Xvu%7eQ<<lEI9]P@] 27}dmSg8>s/cVsXJ8n#&O-i(SfJP!Lpr');
define('LOGGED_IN_SALT',   'gXj$Rj5u6Zz<O(5n0<ptXu4I;P%@!)JLRn.GQT1o6GM !&/s_+lU]2q-C$~,(^.g');
define('NONCE_SALT',       ']^Y6q~_ZDfOL&{$< Z,4[E*I7,0N<NJq:{3EfpuWoaRH~xZ1xdVq>KrkPYOWk~q5');

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
