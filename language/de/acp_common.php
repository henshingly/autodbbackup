<?php
/**
 *
 * @package Auto db Backup
 * @copyright (c) 2020 david63
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
	'CLICK_DONATE' 				=> 'Du möchtest etwas spenden? Dann klicke hier',

	'DONATE'					=> 'Spenden',
	'DONATE_EXTENSIONS'			=> 'Spende an meine Erweiterungen',
	'DONATE_EXTENSIONS_EXPLAIN'	=> 'Diese Erweiterung ist, wie alle meine Erweiterungen, völlig kostenlos. Wenn Sie von dieser profitiert haben, können Sie eine Spende tätigen, indem Sie auf die PayPal-Spendenschaltfläche klicken, oder das nebenstehende QR-Bild “Scan, Pay, Go” verwenden. - Ich würde es begrüßen.<br><br>Ich verspreche es wird weder Spam noch Anfragen für weitere Spenden geben, obwohl diese immer willkommen wären.',

	'NEW_VERSION'				=> 'Neue Version - %s',
	'NEW_VERSION_EXPLAIN'		=> 'Version %1$s dieser Erweiterung steht jetzt zum Download zur Verfügung.<br>%2$s',
	'NEW_VERSION_LINK'			=> 'Hier herunterladen',
	'NO_JS' 					=> 'Du scheist Javascript deaktiviert zu haben.<br>Bitte <a href="https://enablejavascript.co/">aktiviere</a> es in Deinem Browser, um alle Funktionen dieser Seite nutzen zu können.',
	'NO_VERSION_EXPLAIN'		=> 'Informationen zur Versionsaktualisierung sind nicht verfügbar.',

	'PAYPAL_BUTTON'				=> 'Spende mit dem PayPal-Button',
	'PAYPAL_TITLE'				=> 'PayPal - Die sicherere und einfachere Möglichkeit, online zu bezahlen!',
	'PHP_NOT_VALID' 			=> 'Deine PHP Version ist nicht mit dieser Erweiterung kompatibel.',
	'PHPBB_NOT_VALID' 			=> 'Deine phpBB Version ist nicht mit dieser Erweiterung kompatibel.',

	'SAVE'						=> 'Speichern',
	'SAVE_CHANGES'				=> 'Änderungen speichern',

	'VERSION'					=> 'Version',
));
