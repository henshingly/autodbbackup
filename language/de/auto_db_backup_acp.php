<?php
/**
*
* Auto Database Backup
*
* @copyright (c) 2023 Rich McGirr
* @copyright (c) 2014 Lukasz Kaczynski
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
	$lang = array();
}

$lang = array_merge($lang, array(
	'AUTO_DB_BACKUP_SETTINGS'				=> 'Einstellungen für die automatische Datenbanksicherung',
	'AUTO_DB_BACKUP_SETTINGS_EXPLAIN'		=> 'Hier kannst Du die Standardeinstellungen für die automatische Datenbanksicherungen vornehmen. Abhängig von Deiner Serverkonfiguration kann das möglicherweise die Datenbank komprimieren.<br>Alle Backups werden im Ordner <samp>/store/</samp> gespeichert. Du kannst Sicherungen über das Panel <em>Wiederherstellen</em> einspielen.',
	'AUTO_DB_BACKUP_SETTINGS_CHANGED'		=> 'Einstellungen für die automatische Datenbanksicherung geändert.',
	'AUTO_DB_BACKUP_ENABLE'					=> 'Aktivieren Sie die automatische Datenbanksicherung',
	'AUTO_DB_BACKUP_ENABLE_EXPLAIN'			=> 'Aktivieren oder deaktivieren Sie automatische Datenbanksicherungen',
	'AUTO_DB_BACKUP_FREQ'					=> 'Backup Frequenz',
	'AUTO_DB_BACKUP_FREQ_EXPLAIN'			=> 'Legen Sie die Backup Frequenz in Stunden fest.',
	'AUTO_DB_BACKUP_FREQ_ERROR'				=> 'Der eingegebene Wert für <em>Backup Frequenz</em> ist falsch. Der Wert muss größer als <strong>0</strong> sein.',
	'AUTO_DB_BACKUP_COPIES'					=> 'Gespeicherte Backups',
	'AUTO_DB_BACKUP_COPIES_EXPLAIN'			=> 'Die Anzahl der Sicherungen, die auf dem Server gespeichert werden.<br>0 bedeutet deaktiviert und alle Backups werden auf dem Server gespeichert.',
	'AUTO_DB_BACKUP_COPIES_ERROR'			=> 'Der eingegebene Wert für <em>Gespeicherte Sicherungen</em> ist falsch. Der Wert muss gleich oder größer als <strong>0</strong> sein.',
	'AUTO_DB_BACKUP_FILETYPE'				=> 'Dateityp',
	'AUTO_DB_BACKUP_FILETYPE_EXPLAIN'		=> 'Wählen Sie den Dateityp für die Sicherungen.',
	'AUTO_DB_BACKUP_OPTIMIZE'				=> 'Optimieren Sie die Datenbank, bevor Sie die Sicherung durchführen',
	'AUTO_DB_BACKUP_OPTIMIZE_EXPLAIN'		=> 'Optimieren Sie nur nicht optimierte Datenbanktabellen, bevor Sie die Sicherung durchführen.',
	'AUTO_DB_BACKUP_OPTIMIZE_NO'			=> 'Die im Forum verwendete Datenbank ist nicht <strong>MYSQL</strong>!',
	'AUTO_DB_BACKUP_TIME'					=> 'Nächste Sicherungszeit',
	'AUTO_DB_BACKUP_TIME_EXPLAIN'			=> 'Der Zeitpunkt, zu dem die nächste Datenbanksicherung durchgeführt werden soll.<br><strong>Hinweis:</strong> Das angegebene Datum und die angegebene Uhrzeit müssen in der Zukunft liegen.',
	'AUTO_DB_BACKUP_TIME_ERROR'				=> 'Der <strong>nächste Sicherungszeitpunkt</strong> ist falsch. Der Zeitpunkt muss in der Zukunft liegen.',

	'HOUR'		=> 'Stunde',
	'MINUTE'	=> 'Minute',
	'AUTODBBACKUP_REQUIRE'					=> 'Diese Erweiterung erfordert phpBB 3.3 und PHP 7.4. Bitte stelle sicher, dass die Anforderungen der Erweiterung erfüllt sind, sonst wird die Erweiterung nicht installiert.'
));
