<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
define( 'FORCE_SSL_ADMIN', true ); // Redirect All HTTP Page Requests to HTTPS - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
// END iThemes Security - Do not modify or remove this line

/*
 * Load the current settings using the .env file
 */
$envSettings = [];
if (file_exists(dirname(__FILE__).'/.env')) {
    $envSettings = parse_ini_file(dirname(__FILE__).'/.env');
}

/*
 * DB settings
 */
define('DB_NAME', $envSettings['DB_NAME'] ?? 'mediamachine');
define('DB_USER', (isset($envSettings['DB_USER'])) ? $envSettings['DB_USER'] : '');
define('DB_PASSWORD', (isset($envSettings['DB_PASSWORD'])) ? $envSettings['DB_PASSWORD'] : '');
define('DB_HOST', (isset($envSettings['DB_HOST'])) ? $envSettings['DB_HOST'] : 'localhost');
define('DB_CHARSET', (isset($envSettings['DB_CHARSET'])) ? $envSettings['DB_CHARSET'] : 'utf8');
define('DB_COLLATE', (isset($envSettings['DB_COLLATE'])) ? $envSettings['DB_COLLATE'] : '');
$table_prefix = (isset($envSettings['DB_PREFIX'])) ? $envSettings['DB_PREFIX'] : '';

/*
 * Environment settings
 */
define('WP_ENV', (isset($envSettings['WP_ENV'])) ? $envSettings['WP_ENV'] : 'production');
define('WP_HOME', (isset($envSettings['WP_HOME'])) ? $envSettings['WP_HOME'] : '/');
define('WP_DEFAULT_THEME',
    (isset($envSettings['WP_DEFAULT_THEME'])) ? $envSettings['WP_DEFAULT_THEME'] : '');
define('WP_CONTENT_DIR',
    dirname(__FILE__).'/'.((isset($envSettings['WP_CONTENT_DIR'])) ? $envSettings['WP_CONTENT_DIR'] : 'wp-content'));
define('WP_CONTENT_URL',
    WP_HOME.'/'.((isset($envSettings['WP_CONTENT_URL'])) ? $envSettings['WP_CONTENT_URL'] : 'wp-content'));
define('WP_TEMP_DIR',
    WP_CONTENT_DIR.'/'.((isset($envSettings['WP_TEMP_DIR'])) ? $envSettings['WP_TEMP_DIR'] : 'temp'));
define('WP_CACHE_KEY_SALT',
    (isset($envSettings['WP_CACHE_KEY_SALT'])) ? $envSettings['WP_CACHE_KEY_SALT'] : '');

/*
 * theme settings
 */
define('GOOGLEMAPS_API',
    (isset($envSettings['GOOGLEMAPS_API'])) ? $envSettings['GOOGLEMAPS_API'] : '');
define('EVENTBRITE_KEY',
    (isset($envSettings['EVENTBRITE_KEY'])) ? $envSettings['EVENTBRITE_KEY'] : '');
define('SEARCH_RANGE',
    (isset($envSettings['SEARCH_RANGE'])) ? $envSettings['SEARCH_RANGE'] : '10');

/*
 * debug settings
 */
define('DB_DEBUG_MAIL',
    (isset($envSettings['DB_DEBUG_MAIL'])) ? $envSettings['DB_DEBUG_MAIL'] : 'debug@dragonet.nl');
define('AUTOMATIC_UPDATER_DISABLED',
    (isset($envSettings['AUTOMATIC_UPDATER_DISABLED'])) ? $envSettings['AUTOMATIC_UPDATER_DISABLED'] : true);
define('WP_DEBUG',
    (isset($envSettings['WP_DEBUG'])) ? $envSettings['WP_DEBUG'] : false);
define('WP_DEBUG_DISPLAY',
    (isset($envSettings['WP_DEBUG_DISPLAY'])) ? $envSettings['WP_DEBUG_DISPLAY'] : false);
define('WP_DEBUG_LOG',
    WP_TEMP_DIR.((isset($envSettings['WP_DEBUG_LOG'])) ? $envSettings['WP_DEBUG_LOG'] : '/wp-errors.log'));
define('SCRIPT_DEBUG',
    (isset($envSettings['SCRIPT_DEBUG'])) ? $envSettings['SCRIPT_DEBUG'] : false);

/*
 * Salts
 */
define('AUTH_KEY', (isset($envSettings['AUTH_KEY'])) ? $envSettings['AUTH_KEY'] : '');
define('SECURE_AUTH_KEY', (isset($envSettings['SECURE_AUTH_KEY'])) ? $envSettings['SECURE_AUTH_KEY'] : '');
define('LOGGED_IN_KEY', (isset($envSettings['LOGGED_IN_KEY'])) ? $envSettings['LOGGED_IN_KEY'] : '');
define('NONCE_KEY', (isset($envSettings['NONCE_KEY'])) ? $envSettings['NONCE_KEY'] : '');
define('AUTH_SALT', (isset($envSettings['AUTH_SALT'])) ? $envSettings['AUTH_SALT'] : '');
define('SECURE_AUTH_SALT', (isset($envSettings['SECURE_AUTH_SALT'])) ? $envSettings['SECURE_AUTH_SALT'] : '');
define('LOGGED_IN_SALT', (isset($envSettings['LOGGED_IN_SALT'])) ? $envSettings['LOGGED_IN_SALT'] : '');
define('NONCE_SALT', (isset($envSettings['NONCE_SALT'])) ? $envSettings['NONCE_SALT'] : '');

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
