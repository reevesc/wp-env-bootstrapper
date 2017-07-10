# WordPress Environment Bootstrapper
Standard environment bootstrapper used for WordPress websites.

Note that this repo is effectively a restructured version of Studio 24's [WordPress Multi-Environment Config](https://github.com/studio24/wordpress-multi-env-config/blob/master/README.md). It performs all of the same functionality, the primary difference is that the environment configuration files have been moved into their own separate folder in an effort to simplify maintenance and keep the WordPress core as clean and tidy as possible.

Credit to both Studio 24 and FocusLab (for their work on [EE Master Config](https://github.com/focuslabllc/ee-master-config)).

## File Initialization Process
The WordPress Environment Bootstrapper will load it's core files in the following order:

1. **wp-config.php** - This builds off of the default behavior of a standard WordPress installation. That said, with the new/re-written wp-config.php file included in this package, a few additional files/steps have been added to give us some additional functionality
2. **config.env.php** (_config/config.env.php) - The 1st external file from this package that the bootstrapped wp-config.php file will try to load. This particular file (and the code contained within it) will attempt to define the environment that the current instance of the site is running in, based off of the target host specified by the server (e.g. it's domain name)
3. **config.shared.php** (_config/config.shared.php) - The 2nd external file that the bootstrapper will attempt to load. This file stores "shared" settings which may be used across multiple environments (e.g. the WP_DEBUG constant).
    * **Important Note:** Anything specified within this file can be overridden by an environment settings file (see below).
        * For Example: In config.shared.php, if you set the WP_DEBUG constant to TRUE and then within your _config/environments/production.php file you change the value of WP_DEBUG to FALSE, when your production environment is loaded, WP_DEBUG will be set to FALSE, while all other environments will be set to TRUE.
4. **Environment Files** (_config/environments/<your_environment_name>.php) - These are the last files that will be loaded. They contain the unique settings for each one of the environments you have defined (e.g. the database credentials for your each one of your environments). The environment files will inherit any shared settings defined within config.shared.php, but can override those settings by redefining the variable and changing the value according to the requirements of the specific environment in question.
    * **Important Note:** - Your environment files must be named as follows: <WP_ENV>.php where <WP_ENV> is the value assigned to the WP_ENV constant as defined in _config/config.env.php.
        * For Example: If you are attempting to configure your local environment, if you set the WP_ENV constant inside _config/config.env.php to localhost, you will need to have a corresponding localhost.php file within your environments folder (_config/environments/localhost.php).

## Installation
1. To begin, you'll need to have an existing (and working) installation of WordPress. 
2. Make a backup of the wp-config.php file for your WordPress site
3. Clone this repo (or simply copy the files/folders) and place them into the web root of your WordPress installation
4. If you decided to change the name of the '_config' folder as defined within this repo, open the newly created wp-config.php file, locate the $_config array and update the paths accordingly.
5. Open _config/config.shared.php and add any shared configurations the WordPress site uses across all environments. Many of these will likely come from the backup copy of your sites wp-config.php file you made in Step 2 (e.g. AUTH_KEY, SECURE_AUTH_KEY, LOGGED_IN_KEY, etc).
    * Note: All settings added to this file may be overridden by environment specific files - see below.
6. Open _config/config.env.php and enter the domains for the various environments you use for your site
    * Note: By default, the repo provides variables for a production ($production), staging ($stage), and local ($local) environment. You may change the names or add/remove variables to fit the needs of your site. Just be sure to update the switch statement below the environment variables accordingly.
7. Open the environments folder (_config/environments)
    1. For each environment you specified within the _config/config.env.php file, create a copy of the local.php.sample file and rename it to <WP_ENV>.php where <WP_ENV> is the the value you assigned to the WP_ENV constant for that particular environment.
        * For example: If you had 3 separate environments named "local", "stage", and "production" you would want to have 3 separate files in the _config/environments folder named "local.php", "stage.php" and "production.php"
    2. Open each of the newly created environment files and enter any environment specific settings it may have.
