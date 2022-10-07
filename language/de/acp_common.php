<?php
/**
 *
 * @package Auto db Backup
 * @copyright (c) 2015 david63
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, [
	'CLICK_DONATE' 				=> 'Klicke hier um zu spenden',

	'DONATE'					=> 'Spenden',
	'DONATE_EXTENSIONS'			=> 'Spende für meine Erweiterungen',
	'DONATE_EXTENSIONS_EXPLAIN'	=> 'Diese Erweiterung ist wie alle meine Erweiterungen völlig kostenlos. Wenn Du davon profitiert hast, kannst Du eine Spende tätigen, indem Du auf die gegenüberliegende PayPal-Spendenschaltfläche klickst. Ich würde mich freuen. Ich verspreche, dass es weder Spam noch Anfragen für weitere Spenden geben wird, obwohl diese immer willkommen wären.',

	'NEW_VERSION'				=> 'Neue Version - %s',
	'NEW_VERSION_EXPLAIN'		=> 'Version %1$s dieser Erweiterung steht jetzt zum Download zur Verfügung.<br>%2$s',
	'NEW_VERSION_LINK'			=> 'Hier herunterladen',
	'NO_JS' 					=> 'Su scheinst Javascript deaktiviert zu haben.<br>Bitte <a href="https://enablejavascript.co/">aktiviere</a> es in Deinem Browser, um alle Funktionen auf dieser Seite nutzen zu können.',
	'NO_VERSION_EXPLAIN'		=> 'Informationen zur Versionsaktualisierung sind nicht verfügbar.',

	'PAYPAL_BUTTON'				=> 'Spende mit dem PayPal-Button',
	'PAYPAL_TITLE'				=> 'PayPal - Die sicherere und einfachere Möglichkeit, online zu bezahlen!',
	'PHP_NOT_VALID' 			=> 'Deine PHP-Version ist nicht mit dieser Erweiterung kompatibel.',
	'PHPBB_NOT_VALID' 			=> 'Deine phpBB Version ist mit dieser Erweiterung nicht kompatibel.',

	'SAVE'						=> 'Speichern',
	'SAVE_CHANGES'				=> 'Ändeerungen speichern',

	'VERSION' 					=> 'Version',
]);
