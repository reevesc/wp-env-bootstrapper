<?php

/**
 *
 * Define your environments here
 *
 * Add, remove, change the environment variables and switch statement below to 
 * fit the needs of your system
 *
 * Note: If you define an environment below, you MUST create a corresponding
 * file in the environments directory (_config/environments) to store it's 
 * specific configuration settings. See _config/environments/local.php.sample for
 * additional information.
 * 
 */

//
// Declare Environments
//
  $production   = 'example.com';
  $stage        = 'stage.example.com';
  $local        = 'example.local';


//
// Determine Environment and set WP_ENV constant
//
  if( !defined(WP_ENV) )
  {
    switch($wp_config_hostname) //$wp_config_hostname defined in wp-config.php
    {
      case $production :
      case 'www'.$production :
        define('WP_ENV', 'production');
        break;

      case $stage :
        define('WP_ENV', 'stage');
        break;

      case $local :
      default :
        define('WP_ENV', 'local');
        break;
    }
  }