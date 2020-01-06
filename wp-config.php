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

// ** MySQL settings ** //

// If Statement to determine live or local //

if (file_exists(dirname(__FILE__) . '/live.php')) {

// LIVE DATABASE DETAILS //

include('live.php');

define( 'DB_NAME', $WAGDBNAME );
define( 'DB_USER', $WAGDBUSER );
define( 'DB_PASSWORD', $WAGDBPASS );
define( 'DB_HOST', $WAGDBHOST );

} else {
	// LOCAL DATABASE DETAILS //
	define( 'DB_NAME', 'local' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );

}

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wVkiR3mIfYvw3Ptv5cbzDQ8Ky9FUUQTt6Q5dKjdONjk3ygc57EDZMAtz8Eyhgn7EfsC9mQAf1gG1qIgC4zWJZA==');
define('SECURE_AUTH_KEY',  'koFcnARnaYlyHubRQTao0yXriTadc/+IayhA8P/JKgz0DoMPZtlUJxFPbB/J6FBX6GSgNw4OEWa+UnlXvWm3YQ==');
define('LOGGED_IN_KEY',    'fbSmCHRQG6QCa5ceEMP7RIeu2qZunlOAw/u99CipUnKIbqFuImwnC8PrzakLlqn4IxM8/POYRgm4hx9L0nfbeg==');
define('NONCE_KEY',        'JmPd7G9wKVTVcOZlpYuzOhR/h+y+DPyEffQgCqowrAI0PiB9i37SPqkLA1+L2/jdLp7Qn6jopWSgd5pwdc8oSg==');
define('AUTH_SALT',        'DHu2ExvztHExIrPCeUu9JB3F6cfYjW1MHmP/q6edhMZ7KKEq8mNnPI05CrrGaOt88+JUO/tsCnSEu0M2UGaD/g==');
define('SECURE_AUTH_SALT', 'Bbwydr4eMCbYPRuY2Lk+SmkFI/EU2oVwhGfTpG+ftb/MEU9qt6TZtWvQ3hj4QHzRLR3R46YiBmeIdk0SYLt60w==');
define('LOGGED_IN_SALT',   'Ko5JPSYgDpe2mJEJAWGSDUo7+mMu3SQjkKSg1HgbyEInOKyWAXg3gujviveLP5L66GBnS6qC4BuCzZQhDhNryA==');
define('NONCE_SALT',       'mu121W68Wm9gCo5KcQ+51aDCupfRgL0du7fuztTQRz0k247CeMJ5XJ3ZuuzRr4VGhDGrdR/7xzhKb0ur3SOg4Q==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
