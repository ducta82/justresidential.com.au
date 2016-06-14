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
define('DB_NAME', 'justresidential_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '(8*nyjW[$:t}F8_M}!a^X{Zy|ry:za,BsW1j@lk6*H2(A{9d39F}yY?aMX|1@(}O');
define('SECURE_AUTH_KEY',  'lWwRPND9h2Z=7+K3ur .6qATNaA|2h0=G_1)uSaENfh%IQ%TVunCvC{#v2?r8j8`');
define('LOGGED_IN_KEY',    '&uWEvB<@i7in]Os$h/V`r~cK{i~:}1t$$/-LMd%mrQI#{F,2!~WitFfw,sxS/(9[');
define('NONCE_KEY',        'z}I>@pfQI4?$e?`r4i8v5;BlQt}hn2;ogOEzu5!|tcQ2XZ5<geH&6O&r^9N#$pPg');
define('AUTH_SALT',        'y8;VvxO+%Pc0d;>LjWIe{q+p6H$g/33M;-XS]t4mza_Jpf$W8^1Qy<LC!Opo*dI ');
define('SECURE_AUTH_SALT', 'Lt3^Q[-=9@qTX:fx/*F.Es5QCVA=rYrk~3[HdWe@GwsF;+P.%8ycPZ^}AEM!C>}v');
define('LOGGED_IN_SALT',   'Pf`tx]Wk6y3XZdf>p@_|_H8`g-^a%7^Qm+^b&.Ah/GJDQFOC&^pd9wL1~4wJ_dnn');
define('NONCE_SALT',       '9Kr$(/`e~&f5+1fzBl-eD<<Bn[)QxgQAS@8by]4-9M1%hNBXZ{S6VqfP=M]~o<)g');

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
