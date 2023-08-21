=== _themename ===

Contributors: automattic
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready

Requires at least: 4.5
Tested up to: 5.4
Requires PHP: 5.6
Stable tag: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE

A starter theme called _themename.

== Description ==

1. Use NPM and GULP for edit theme.
2. Do not add code to assets folder. Only to src/assets and run gulp scenarios.

== Development environment ==

1. Open Terminal. Point CD to theme folder with source files (package.json required)
2. Run: npm install
3. After install you can use GULP scenarios:
npm run watch - for live changes
npm run bundle - will generate .zip archive with final theme files in "packaged" folder inside your theme.

== Installation on website ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file from "packaged" folder inside your development environment. Click Install Now.
3. Click Activate to use your new theme right away or Update existing theme.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

_themename includes support for WooCommerce and for Infinite Scroll in Jetpack.

== Changelog ==

= 1.0 - May 12 2015 =
* Initial release

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
