<?php

/**
 *
 * Instructions:
 * 
 * Make a copy of this file and rename it to the corresponding environment you are configuring.
 * File name should follow the format of <WP_ENV>.php
 *   Where <WP_ENV> is the value of the constant you declared in _config/config.env.php
 *
 * Next, add any environment specific constants, settings, etc. below.
 *   Note that anything you define in this file will override any matching config settings defined in config.shared.php
 *
 *
 */

//
// Database Settings
//
define('DB_NAME', 'lc_laurencain');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
//define('DB_COLLATE', '');


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
//define('WP_DEBUG', true);