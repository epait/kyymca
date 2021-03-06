=== All-in-One WP Migration ===
Contributors: yani.iliev, bangelov, pimjitsawang
Tags: db migration, migration, wordpress migration, db backup, db restore, website backup, website restore, website migration, website deploy, wordpress deploy, db backup, database export, database serialization, database find replace
Requires at least: 3.3
Tested up to: 4.0
Stable tag: 2.1.0.7
License: GPLv2 or later

All-in-One WP Migration is the only tool that you will ever need to migrate a WordPress site.

== Description ==

The plugin allows you to export your database, media files, plugins, and themes.
You can apply unlimited find and replace operations on your database and the plugin will also fix any serialization problems that occur during find/replace operations.

All in One WP Plugin is the first plugin to offer true mobile experience on WordPress versions 3.3 and up.

= Works on all hosting providers =
* The plugin doesn't depend on any extensions making it compatible with all PHP hosting providers
* The plugin exports and imports data in time chunks of 3 seconds each which keeps the plugin below the max execution time that most providers set to 30 seconds.
* We've tested the plugin on the major Linux distributions, OS X, and Microsoft Windows.

= Bypass all upload size restriction =
* We use chunks to import your data and that way we bypass any webserver upload size restrictions up to **512MB** - commercial version supports up to **5GB**

= 0 Dependencies =
* The plugin doesn't require any php extensions and can work with php v5.2

= Support for MySQL, PDO, MySQLi =
* No matter what php mysql driver your webserver ships with, we support it

= Support WordPress v3.3 up to v4.0 =
* We tested every WordPress version from `3.3` up to `4.0`

* [Find out more about us](https://servmask.com)

[youtube http://www.youtube.com/watch?v=5FMzLf9a4Dc]

== Installation ==

1. Upload the `all-in-one-wp-migration` folder to the `/wp-content/plugins/` directory
1. Activate the All in One WP Migration plugin through the 'Plugins' menu in WordPress
1. Configure the plugin by going to the `Site Migration` menu that appears in your admin menu

== Screenshots ==

1. Mobile Export page
2. Mobile Import page
3. Plugin Menu

== Changelog ==
= 2.1.1 =
* Added export/import to buttons with file/dropbox/amazon/google targets
* Implemented our own archiving format that reduces export and import by a factor of 10
* Both export and import happen in time chunks of 3 seconds
* Simplified export page

= 2.0.3 =
* Fixed a security issue when importing site using regular users

= 2.0.2 =
* Added support for WordPress v4.0

= 2.0.1 =
* Fixed a bug when all user permissions are lost on import

= 2.0.0 =
* Added support for migration of WordPress in Network Mode (Multi Site)
* New improved UI and UX
* New improved language translations on the menu items and help texts
* Better error handling and notifications
* Fixed a bug when exporting comments and associated comments meta data
* Fixed a bug when using find and replace functionality
* Fixed a bug with storage directory permissions and search indexation

= 1.9.2 =
* Added PHP <= v5.2.7 compatibility

= 1.9.1 =
* Fixed an issue with earlier versions of PHP

= 1.9.0 =
* New improved design on the export/import page
* Added an option for gathering user experience statistics
* Added a message box with important notifications about the plugin
* Fixed a bug when exporting database with multiple WordPress sites
* Fixed a bug when exporting database with table constraints
* Fixed a bug with auto recognizing zip archiver

= 1.8.1 =
* Added "Get Support" link in the plugin list page
* Removed "All in One WP Migration Beta" link from the readme file

= 1.8.0 =
* Added support for dynamically recognizing Site URL and Home URL on the import page
* Fixed a bug when maximum uploaded size is exceeded
* Fixed a bug when exporting big database tables

= 1.7.2 =
* Added support for automatically switching database adapters for better performance and optimization
* Fixed a bug when using host:port syntax with MySQL PDO
* Fixed a bug when using find and replace functionality

= 1.7.1 =
* Fixed a bug when exporting WordPress plugins directory

= 1.7.0 =
* Added storage layer to avoid permission issues with OS's directory used for temporary storage
* Added additional checks to verify the consistency of the imported archive
* Fixed a bug that caused the database to be exported without data
* Removed unused variables from package.json file

= 1.6.0 =
* Added additional check for directory's permissions
* Added additional check for output buffering when exporting a file
* Fixed a bug when the archive was exported or imported with old version of Zlib library
* Fixed a bug with permalinks and flushing the rules

= 1.5.0 =
* Added support for additional errors and exceptions handling
* Added support for reporting a problem in better and easier way
* Improved support process in ZenDesk system for faster response time
* Fixed typos on the import page. Thanks to Terry Heenan

= 1.4.0 =
* Adding a twitter and facebook share buttons to the sidebar on import and export pages

= 1.3.1 =
* Fixed a bug when the user was unable to import site archive
* Optimize and speed up import process

= 1.3.0 =
* Added support for mysql connection to happen over sockets or TCP
* Added support for Windows OS and fully tested the plugin on IIS
* Added support for limited memory_limit - 1MB - The plugin now requires only 1MB to operate properly
* Added support for multisite
* Use mysql_unbuffered_query instead of mysql_query to overcome any memory problems
* Fixed a deprecated warning for mysql_pconnect when php 5.5 and above is used
* Fixed memory_limit problem with PCLZIP library
* Fixed a bug when the archive is exported with zero size when using PCLZIP
* Fixed a bug when the archive was exported broken on some servers
* Fixed a deprecated usage of preg_replace \e in php v5.5 and above

= 1.2.1 =
* Fixed an issue when HTTP Error was shown on some hosts after import, credit to Michael Simon
* Fixed an issue when exporting databases with different prefix than wp_, credit to najtrox
* Fixed an issue when PDO is avalable but mysql driver for PDO is not, credit to Jaydesain69
* Delete a plugin specific option when uninstalling the plugin (clean after itself)
* Support is done via Zendesk
* Include WP Version and Plugin version in the feedback form

= 1.2.0 =
* Increased upload limit of files from 128MB to 512MB
* Use ZipArchive with fallback to PclZip (a few users notified us that they don’t have ZipArchive enabled on their servers)
* Use PDO with fallback to mysql (a few users notified us that they dont have PDO enabled on their servers, mysql is deprecated as of PHP v5.5 but we are supporting PHP v5.2.17).
* Support for PHP v5.2.17 and WordPress v3.3 and above.
* Fix a bug during export that causes plugins to not be exported on some hosts (the problem that you are experiencing).

= 1.1.0 =
* Importing files using chunks to overcome any webserver upload size restriction
* Fixed a bug where HTTP code error was shown to some users

= 1.0.0 =

* Export database as SQL file
* Export media files
* Export themes files
* Export installed plugins
* Unlimited Find & replaces
* Option to exclude spam comments
* Option to apply find & replace to GUIDs
* Option to exclude post revisions
* Option to exclude tables data
* WordPress multisite support
