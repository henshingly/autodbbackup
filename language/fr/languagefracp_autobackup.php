<?php
/**
*
* Auto database backup extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2017 david63
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
  'AUTO_DB_BACKUP_COPIES'                 => 'Nombre de sauvegardes conservées',
  'AUTO_DB_BACKUP_COPIES_EXPLAIN'         => 'Permet de saisir le nombre de sauvegardes qui seront stockées sur le serveur.<br />Saisir 0 pour désactiver cette limite d’archivage, ainsi toutes les sauvegardes seront stockées sur le serveur.',
  'AUTO_DB_BACKUP_ENABLE'                 => 'Activer la sauvegarde automatique de la base de données',
  'AUTO_DB_BACKUP_ENABLE_EXPLAIN'         => 'Permet d’activer ou de désactiver les sauvegardes automatiques de la base de données.',
  'AUTO_DB_BACKUP_FILETYPE'               => 'Type de fichiers',
  'AUTO_DB_BACKUP_FILETYPE_EXPLAIN'       => 'Permet de sélectionner le type de fichier généré pour les sauvegardes.',
  'AUTO_DB_BACKUP_FREQ'                   => 'Fréquence de la sauvegarde',
  'AUTO_DB_BACKUP_FREQ_EXPLAIN'           => 'Permet de saisir la fréquence en heures de la sauvegarde.',
  'AUTO_DB_BACKUP_MAINTAIN_FREQ'          => 'Maintenir l’heure d’exécution des sauvegardes',
  'AUTO_DB_BACKUP_MAINTAIN_FREQ_EXPLAIN'  => 'Permet de maintenir l’heure d’exécution des sauvegardes.<br />Par exemple - Si l’heure de la sauvegarde est définie sur 23h15 et la fréquence sur 24 heures alors la prochaine sauvegarde s’effectuera à 23h15 le jour suivant. Si cette option est désactivée alors la prochaine sauvegarde s’effectuera 24 heures après le lancement de la dernière sauvegarde.',
  'AUTO_DB_BACKUP_OPTIMIZE'               => 'Optimiser la base de données avant la sauvegarde',
  'AUTO_DB_BACKUP_OPTIMIZE_EXPLAIN'       => 'Permet d’optimiser uniquement les tables de la base de données qui ne le sont pas avant de réaliser la sauvegarde.',
  'AUTO_DB_BACKUP_SETTINGS'               => 'Paramètres de la sauvegarde automatique de la base de données',
  'AUTO_DB_BACKUP_SETTINGS_CHANGED'       => 'Les paramètres de la sauvegarde automatique de la base de données ont été sauvegardés.',
  'AUTO_DB_BACKUP_SETTINGS_EXPLAIN'       => 'Sur cette page il est possible de configurer les paramètres par défaut de la sauvegarde automatique de la base de données. Selon la configuration du serveur utilisé, il sera possible de compresser la base de données.<br />Toutes les sauvegardes seront stockées dans le répertoire <samp>./store/</samp>. La procédure de restauration est disponible depuis le page <em>Restaurer</em>.',
  'AUTO_DB_BACKUP_TIME'                   => 'Prochaine date de la sauvegarde',
  'AUTO_DB_BACKUP_TIME_ERROR'             => 'La date de la <em>prochaine sauvegarde</em> est incorrecte. La date doit être à venir.',
  'AUTO_DB_BACKUP_TIME_EXPLAIN'           => 'Permet de spécifier la date de la prochaine sauvegarde de la base de données.<br /><strong>Note</strong> : La date doit être à venir.',
  'CLICK_SELECT'                          => 'Cliquer dans la boite de texte pour sélectionner la date & l’heure',
  'DATE_FORMAT_ERROR'                     => 'Le format de la date/heure de la prochaine sauvegarde est incorrect.',
  'VERSION'                               => 'Version',

  'FILETYPE' => array(
    'gzip'   => 'gzip',
    'bzip2'  => 'bzip2',
    'text'   => 'text',
  ),
));

// Date/time picker
$lang = array_merge($lang, array(
  'CLOSE_TEXT'         => 'Terminé',
  'CURRENT_TEXT_DATE'  => 'Maintenant',
  'HOUR_TEXT'          => 'Heures',
  'MINUTE_TEXT'        => 'Minutes',
  'NEXT_TEXT'          => 'Suivant »',
  'PREV_TEXT'          => '« Précédent',
  'TIME_TEXT'          => 'Heure',

  // Translators note: retain the format of [" "] as they are creating JSON compatible arrays
  'DAY_NAMES_MIN'  => '["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"]',
  'MONTH_NAMES'    => '["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"]',
));

// Donate
$lang = array_merge($lang, array(
  'DONATE'                     => 'Donation',
  'DONATE_EXTENSIONS'          => 'Soutenir le développement de mes extensions',
  'DONATE_EXTENSIONS_EXPLAIN'  => 'Cette extension, comme toutes mes extensions, est totalement libre d’utilisation et ce sans frais. Si vous estimez qu’elle vous est bénéfique merci de soutenir son développement en effectuant un don via le bouton « Faire un don via PayPal » - J’apprécierai grandement votre geste. Aussi, je m’engage à ne pas divulguer à quiconque votre contact ni à vous envoyer des demandes de soutiens tels que les dons.',

  'PAYPAL_BUTTON'  => 'Faire un don via PayPal',
  'PAYPAL_TITLE'   => 'PayPal - Le paiement en ligne, simple et sécurisé.',
));