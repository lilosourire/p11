<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'mota-photo' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_R*VfRB]{h+bQxa9Ma!R&h36R^CM4^%?g}HMmVS ^}.}Q<yNkM>6Q+9k!j#B~szH' );
define( 'SECURE_AUTH_KEY',  'dd+/6yyp%>tq;V3+8ym*2w{LngSK/Uqll!zQ=a7YMks7tV1~hjQY7/{~vzzGWTw#' );
define( 'LOGGED_IN_KEY',    'H}Pe#e2KH.$EiS_#n&+=4O$$_,3Z^%Xg2=F>EZN-+6b9kUbW|T{9-,6op*;?M;rI' );
define( 'NONCE_KEY',        'l=|G?03#n*[[[?yp.2wCaH5gL~@WtBL4rTe5BPPB<QrU-i$gx1N6>]~}u8xJq}i7' );
define( 'AUTH_SALT',        '(L:L?e3/$@ J<y|T@xi%-D;f#u[[d!tLdI5Z)1?R^OUaUuk5k7>z0hX3@l:4=)`$' );
define( 'SECURE_AUTH_SALT', 'hZZ2E|:yR4JeFC ~>t9!]xMxGffL@fm0CFmZ%!x=*r=}2NV2~tj#i%,bMe*OZ3<Q' );
define( 'LOGGED_IN_SALT',   'yBVWJp~6EmTWO0q#RQ7_5=7$r|scM5OykoGx1pisSnu#5VaAQ|6ciW%s6wGm=,f!' );
define( 'NONCE_SALT',       'ecqlTa2luA#PSHfnK72[~$xsnISHcc[5mtOBbe2Yfip16xDrwmCqN_;r%gP5c-KE' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
