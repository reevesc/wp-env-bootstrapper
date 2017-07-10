<?php

/**
 *
 * Place all constants, settings, etc. shared across environments 
 * in this file. 
 *
 * Note that anything defined in this file AND your environment file(s) will be overriden 
 *
 */


/**
 * 
 * Shared database settings
 *
 */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');



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


/**
 *
 * Set WP Site URL
 *
 */

  //define protocol
  $protocol = ( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ) ? 'https://' : 'http://';

  //Set WP_SITEURL
  if ( !defined('WP_SITEURL') ) define('WP_SITEURL', $protocol . rtrim($hostname, '/'));

  //Set WP_HOME
  if (!defined('WP_HOME')) define('WP_HOME', $protocol . rtrim($hostname, '/'));


/**
 *
 * Define W3 Total Cache hostname
 *
 */
  if ( defined('WP_CACHE') ) define('COOKIE_DOMAIN', $hostname);

  