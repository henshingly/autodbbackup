<?php
/**
*
* @package Auto db Backup (3.2)
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

$lang = array_merge($lang, array(
	'AUTO_DB_BACKUP_COPIES'					=> 'Gespeicherte Backups',
	'AUTO_DB_BACKUP_COPIES_EXPLAIN'			=> 'Die Anzahl der Sicherungen, die auf dem Server gespeichert werden.<br>0 bedeutet deaktiviert und alle Backups werden auf dem Server gespeichert.',
	'AUTO_DB_BACKUP_ENABLE'					=> 'Aktiviere die automatische Datenbanksicherung',
	'AUTO_DB_BACKUP_ENABLE_EXPLAIN'			=> 'Aktivieren oder deaktiviere die automatische Datenbanksicherungen',
	'AUTO_DB_BACKUP_FILETYPE'				=> 'Dateityp',
	'AUTO_DB_BACKUP_FILETYPE_EXPLAIN'		=> 'Wähle den Dateityp für die Sicherungen.',
	'AUTO_DB_BACKUP_FREQ'					=> 'Backup Frequenz',
	'AUTO_DB_BACKUP_FREQ_EXPLAIN'			=> 'Lege die Backup Frequenz in Stunden fest.',
	'AUTO_DB_BACKUP_MAINTAIN_FREQ'			=> 'Backup-Häufigkeit beibehalten',
	'AUTO_DB_BACKUP_MAINTAIN_FREQ_EXPLAIN'	=> 'Wenn Du dies auf <strong>“Ja”</strong> setzen, wird die Sicherungshäufigkeitszeit beibehalten.<br>Beispiel: Wenn die Uhrzeit auf 23:15 Uhr und die Häufigkeit auf 24 Stunden eingestellt ist, erfolgt die nächste Sicherung am nächsten Tag um 23:15 Uhr. Wenn dies auf <strong>“Nein”</strong> eingestellt ist, erfolgt die nächste Sicherung 24 Stunden nach Ausführung der Sicherung.',
	'AUTO_DB_BACKUP_OPTIMIZE'				=> 'Optimiere die Datenbank, bevor Du die Sicherung durchführst',
	'AUTO_DB_BACKUP_OPTIMIZE_EXPLAIN'		=> 'Optimiere nur nicht optimierte Datenbanktabellen, bevor Du die Sicherung durchführst.',
	'AUTO_DB_BACKUP_SETTINGS'				=> 'Einstellungen für die automatische Datenbanksicherung',
	'AUTO_DB_BACKUP_SETTINGS_CHANGED'		=> 'Einstellungen für die automatische Datenbanksicherung geändert.',
	'AUTO_DB_BACKUP_SETTINGS_EXPLAIN'		=> 'Hier kannst Du die Standardeinstellungen für automatische Datenbanksicherungen vornehmen. Abhängig von Deiner Serverkonfiguration können Sie möglicherweise die Datenbank komprimieren.<br>Alle Backups werden im Ordner <samp>/store/</samp> gespeichert. Du kannst über den Bereich <em><strong>Datenbank</strong> -> <strong>Wiederherstellen</strong></em> eine Wiederherstellung starten.',
	'AUTO_DB_BACKUP_TIME'					=> 'Nächste Sicherungszeit',
	'AUTO_DB_BACKUP_TIME_ERROR'				=> 'Der <strong>nächste Sicherungszeitpunkt</strong> ist falsch. Der Zeitpunkt muss in der Zukunft liegen.',
	'AUTO_DB_BACKUP_TIME_EXPLAIN'			=> 'Der Zeitpunkt, zu dem die nächste Datenbanksicherung durchgeführt werden soll.<br><strong>Hinweis:</strong> Das angegebene Datum und die angegebene Uhrzeit müssen in der Zukunft liegen.',

	'CLICK_SELECT'							=> 'Klicke in das Textfeld, um Datum / Uhrzeit auszuwählen',

	'DATE_FORMAT_ERROR'						=> 'Das nächste Datums- / Uhrzeitformat der Sicherung ist ungültig.',

	'INVALID_PHP_TIMEZONE'					=> 'Die Standard-Timzone in Deiner php.ini-Datei ist ungültig.',
	'INVALID_USER_TIMEZONE'					=> 'Es liegt ein Problem mit Deiner Zeitzoneneinstellung im UCP vor.',

	'NO_TIMEZONE_SET'						=> 'Du hast kein Zeitzone in Deinem UCP festgelegt - bitte stelle diese ein, bevor Du fortfahren kannst.',

	'FILETYPE'	=> array(
		'gzip'	=> 'gzip',
		'bzip2'	=> 'bzip2',
		'text'	=> 'text',
	),

	'FILE_SIZE'	=> array(
		1 => 'bytes',
		2 => 'KB',
		3 => 'MB',
		4 => 'GB',
		5 => 'TB',
	),
));

// Date/time picker
$lang = array_merge($lang, array(
	'HOUR_TEXT'				=> 'Stunde',
	'MINUTE_TEXT'			=> 'Minute',
	'NEXT_TEXT'				=> 'Nächster »',
	'PREV_TEXT'				=> '« Vorheriger',
	'TIME_TEXT'				=> 'Zeit',

	// Translators note: retain the format of [" "] as they are creating JSON compatible arrays
	'DAY_NAMES_MIN'			=> '["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"]',
	'MONTH_NAMES' 			=> '["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"]',
));
