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


/**
 *
 * Notice: This installation of WordPress has been Bootstrapped!
 *  Please see _config directory for environment specific settings/configuration
 *
 */


/**
 *
 * wp-config settings
 *
 */


// Absolute path to the WordPress directory
  if ( !defined('ABSPATH') )
  {
    define('ABSPATH', dirname(__FILE__) . '/');
  }


// Bootstrap config array
//
// NOTE: If you rename the _config folder, or any of the files/directories contained therein
// be sure to update the variables below...
  $_config = array(
    'env_file_path' => ABSPATH . '_config/config.env.php',
    'shared_file_path' => ABSPATH . '_config/config.shared.php',
    'environments_dir_path' => ABSPATH . '_config/environments/'
  );


// If 'WP_ENV' environment variable exists, map 'WP_ENV' constant to it
  if ( getenv('WP_ENV') !== false )
  {
    // Filter non-alphabetical characters for security
    define('WP_ENV', preg_replace('/[^a-z]/', '', getenv('WP_ENV')));
  } 


//
// Set site hostname 
//  Note that $wp_config_hostname will be referenced in _config/config.env.php
//
  $wp_config_hostname = ( !empty($_SERVER['HTTP_X_FORWARDED_HOST']) ) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']; 


// If WordPress has been bootstrapped via WP-CLI detect environment from --env=<environment> argument
  if (PHP_SAPI == "cli" && defined('WP_CLI_ROOT'))
  {
    foreach ($argv as $arg)
    {
      if (preg_match('/--env=(.+)/', $arg, $m))
      {
        define('WP_ENV', $m[1]);
      }
    }
    $wp_config_hostname = "local";
  }


// Filter/Sanitize hostname
  $wp_config_hostname = filter_var($wp_config_hostname, FILTER_SANITIZE_STRING);


// If the WP_ENV constant wasn't defined above via an environment variable, use
// _config/config.env.php to define it
  if ( !defined('WP_ENV') && file_exists($_config['env_file_path']) ) include $_config['env_file_path'];


// Load shared settings (_config/config.shared.php)
  if ( file_exists($_config['shared_file_path']) ) include $_config['shared_file_path'];


// Load environment specific settings (_config/environments/<WP_ENV>.php)
  if( file_exists($_config['environments_dir_path']) ) include rtrim($_config['environments_dir_path'], '/') . '/' . WP_ENV . '.php';


// Clean it up
  unset( $_config, $wp_config_hostname );


// And hand everything back over to WordPress
  require_once(ABSPATH . 'wp-settings.php');