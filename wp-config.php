<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'YourStrongPassword123!' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
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
define( 'AUTH_KEY',         'O;37g{i({6EcKfG+LbOm1G`?!% &T?iKb]DYN3!2g2jWH-Bd63oaW.rwzCnpw`<O' );
define( 'SECURE_AUTH_KEY',  '?b%+FCrChc42S+@;z4&j0dX8zv>ty5D4A;)45R.eT96lJhjk$kZS2jg4>%SAQ+(%' );
define( 'LOGGED_IN_KEY',    '1?^0Ye1=_Kmk?)|hch^[W>oAKE#2:Xlro|az|v+H*GKmjYs?41!5G!x6]H0#gqRD' );
define( 'NONCE_KEY',        '?e-p^:g5[4KyNMSvJr,p*lo>eUK{W#jKLkp~uX<S-f3QKj,[d-R;!siU#)?NU-0L' );
define( 'AUTH_SALT',        'TA/pXXQ/aj8nq1Yk0YG>n%wT]%Fh7@WOZ-O0w}|&,9bdtBZw8bU50,{ aQuryU$V' );
define( 'SECURE_AUTH_SALT', '6~W|aYLdd39a,=Q&-&=ybbkDN%}-6T.D/$jWyM(14.js_#:yOq%$gu7c 5D5ZngA' );
define( 'LOGGED_IN_SALT',   'i^ZxEYv91eRbZPu7yq7Ukgb2?X@mbakCm[F!uhc~<4nEYjAS2sq|l;|KD<;S_p%D' );
define( 'NONCE_SALT',       '~-7$b8>mvQ)Qhl^T&81XQC>X,-<#gV8bvd`1E0Sb/5#*9:^oAM5e{]P>){|Sl/Vr' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
