== WPServeur Migration ===
Contributors: blogvault, akshatc, wpserveur
Tags: wpserveur, migration
Requires at least: 4.0
Tested up to: 5.8
Requires PHP: 5.4.0
Stable tag: 4.69
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Serveur Migration vous permet de migrer facilement votre site WordPress sur la plateforme WP Serveur.

== Description ==

WP Serveur Migration vous permet de migrer facilement votre site WordPress sur la plateforme WP Serveur.
Tout ce que avez à faire, c'est de fournir vos accès FTP et le plugin se charge de tout.

Pour obtenir des instructions et des solutions aux erreurs courantes, merci de visiter notre article dédié https://www.wpserveur.net/migration-wpserveur/

[vimeo https://vimeo.com/156818749]

= Développeurs =

Cet outil vous fournira un moyen rapide de migrer vos sites, vous permettant de travailler sur vos autres projets en laissant le plugin faire le boulot.
Pas besoin de vous soucier de la recherche / remplacement des valeurs de la base de données, le plugin le fait pour vous.
Vous pouvez migrer plusieurs sites très facilement.

= Marketeurs =

Inquiet à propos de votre SEO ? Le plugin vous permet de garder tous vos liens à l'identique, en prenant soin de ne pas abimer votre SEO.
Un minimum de connaissances techniques pour migrer votre site sur WP Serveur.

= Propriétaires de site =

Pas besoin de faire appel à un outil de migration tiers.
Un minimum de connaissances techniques pour migrer votre site sur WP Serveur.


Mentions légales
En utilisant ce plugin, vous acceptez nos conditions d'utilisation

**Nota Bene**
Ce plugin ne peut migrer votre site que vers WP Serveur. Il ne fonctionnera pas avec d'autres hébergements.

== Installation ==

Téléchargez bv-migration-to-wpserveur dans le répertoire /wp-content/plugins/
Activez-le via le menu Extensions depuis l'admin WordPress

Si vous avez WordPress 2.7 ou au-dessus, vous pouvez simplement aller dans 'Extensions' > 'Ajouter' et chercher "WP Serveur Migration" puis l'installer et l'activer

== Changelog ==
= 4.69 =
* Improved network call efficiency for site info callbacks.

= 4.68 =
* Removing use of constants for arrays for PHP 5.4 support.
* Post type fetch improvement.

= 4.65 =
* Robust handling of requests params.
* Callback wing versioning.

= 4.62 =
* MultiTable Sync in single callback functionality added.
* Improved host info
* Fixed services data fetch bug
* Fixed account listing bug in wp-admin

= 4.58 =
* Better Handling of error message from Server on signup
* Added Support for Multi Table Callbacks

= 4.35 =
* Improved scanfiles and filelist api

= 4.31 =
* Fetching Mysql Version
* Robust data fetch APIs
* Core plugin changes
* Sanitizing incoming params

= 3.4 =
* Plugin branding fixes

= 3.2 =
* Updating account authentication struture

= 2.11 =
* Adding support for custom user tables

= 2.1 =
* Restructuring classes

= 1.88 =
* Callback improvements

= 1.86 =
* Updating tested upto 5.1

= 1.84 =
* Disable form on submit

= 1.82 =
* Updating tested upto 5.0

= 1.77 =
* Adding function_exists for getmyuid and get_current_user functions 

= 1.76 =
* Removing create_funtion for PHP 7.2 compatibility

= 1.72 =
* Adding Misc Callback

= 1.71 =
* Adding logout functionality in the plugin

= 1.69 =
* Adding support for chunked base64 encoding

= 1.68 =
* Updating upload rows

= 1.66 =
* Updating TOS and privacy policies

= 1.64 =
* Bug fixes for lp and fw

= 1.62 =
* SSL support in plugin for API calls
* Adding support for plugin branding

= 1.44 =
* Removed bv_manage_site
* Updated asym_key

= 1.41 =
* Better integrity checking
* Woo Commerce Dynamic sync support

= 1.40 =
* Manage sites straight from BlogVault dashboard

= 1.31 =
* Changing dynamic backups to be pull-based

= 1.30 =
* Using dbsig based authenticatation

= 1.22 =
* Adding support for GLOB based directory listings

= 1.21 =
* Adding support for PHP 5 style constructors

= 1.20 =
* First release of WPServeur Automated Migration Plugin
