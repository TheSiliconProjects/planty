<?php

/**
###############################################################################
#                                                                             #
#               openSUSE Tumbleweed : WP Dev Standalone Global                #
#                          -=== suse-arm64-fbox ===-                          #
#                                                                             #
#          In<=		/srv/www/htdocs/wordpress/global-standalone           #
#          Owner=	wwwrun:www                                            #
#          Rights=	664                                                   #
#          LocalName=	wp-config.php                                         #
#          RepoName=	wp_config_global_standalone.config                    #
#          Profile=	TUMBLEFBOX                                            #
#                                                                             #
###############################################################################

Ressources :

Download latest international : https://wordpress.org/latest.zip
Language pack : https://downloads.wordpress.org/release/nl_NL/wordpress-6.4.1.zip

*/

define( 'WPCACHEHOME', '/srv/www/htdocs/wordpress/global-standalone/wp-content/plugins/wp-super-cache/' );
define( 'ITSEC_ENCRYPTION_KEY', 'Nm05YXFOaXl5ekVue0A3LD8lei0jKy16OT5UMTsmNWAgdnE0dlR9NlBnOFpyXysoXmg0Ym5sLHpXQjx1L0ZgWA==' );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'DB_NAME', 'wordpress_development_standalone' );

/** Database username */
define( 'DB_USER', 'Wordpress-Dev2' );

/** Database password */
define( 'DB_PASSWORD', 'WUOfPEaVxz7SUC8UhAkJRcCtPMhHB6y9566xEvxk' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt.
by default utf8mb4_unicode_ci which better handle chinese typo (check with mysql db) */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_stdalone';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/

 * If DEBUG is set to true :

 * WP_DEBUG_LOG : true => feeds debug.log file in wp-content directory
 * WP_DEBUG_DISPLAY : false => don't display bug, useful if WPDEBUG_LOG is set to true 

 */

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/** override FTP protocol */
define('FS_METHOD','direct');


/**

------------------------------------------------- 
- PHP Zlib compression / Apache 2 Gzip conflict -
-------------------------------------------------

gzip compression/decompression may be handeld by php zlib library or apache via optional 'mod_gzip + mod_deflate'

Both can't be activated at the same time. So if Apache 2 modules are activated zlib php must be deactivated through php.ini located in /etc/php8/%server_type%/ with

zlib.output_compression=Off

If given apache2 module are not activated (or for example not using apache server at all) one should activate the php zlib library with

zlib.output_compression=On


So, following lines should not be required in most of case, this is a simple hack if php zlib is required and is still persistenly
deactvated, what can happen sometimes with some web hosting services


if (!function_exists('gzopen')) {
   function gzopen($filename , $mode, $use_include_path = 0 ) { 
      return gzopen64($filename, $mode, $use_include_path); 
   }
}

*/