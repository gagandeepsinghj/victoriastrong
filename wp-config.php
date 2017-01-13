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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/hermes/bosnaweb21a/b1834/nf.vsmc/public_html/victoriastrong.ca/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'victoria_160129');

/** MySQL database username */
define('DB_USER', 'victoria_160129');

/** MySQL database password */
define('DB_PASSWORD', 'Victory^*^@2313');

/** MySQL hostname */
define('DB_HOST', 'vsmc.netfirmsmysql.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'ttrxziwuaae5icxqptboij0ebul1t1imraqcohussmpcz9vuavpcddf4b74g76sv');
define('SECURE_AUTH_KEY',  '7cl0y7wphldhc1tk6jab1tcnobhj4qg9bucfhzsvorwdmx2si9dohxnn1owfihmg');
define('LOGGED_IN_KEY',    'kkgxqwzyb0a2helypfl9kgo0abugujz15y5dxw8ryeg6ppbmes7rqdhpfzygiwok');
define('NONCE_KEY',        'krihscnhlet1e05h1fw3duq5tiv8dxbyjanrwag2ld2tfrtpelsvtdzindkkqp0j');
define('AUTH_SALT',        'l56zkp0ys6znryc4poacgbtlztqt8iufkqvxmqmasxvb4i3opnyiu1nj3njnu1cp');
define('SECURE_AUTH_SALT', 'liao9sahnc6fvs4pfvchee2uxnjmvnbwmthzpqjtiwjrrz0xctca8m73enbdnprq');
define('LOGGED_IN_SALT',   'b6fyqdnfwlwpfy9csyfjvlopabayan1iljhbqzd7gobeucxnqudgrmkzlfopkb1v');
define('NONCE_SALT',       'ehg1czpbz7lhu4hs048nsperdpid1gfscvmn4tthybd3svssp8w7pod3mp2qt9gr');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_victoriastrong';

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