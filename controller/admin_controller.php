<?php
/**
*
* Auto Database Backup
*
* @copyright 2024 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace pico\autodbbackup\controller;

use phpbb\config\config;
use phpbb\db\driver\driver_interface as db;
use phpbb\language\language;
use phpbb\log\log;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\user;

class admin_controller
{
	/** @var config */
	protected $config;

	/** @var db */
	protected $db;

	/** @var language */
	protected $language;

	/** @var log */
	protected $log;

	/** @var request */
	protected $request;

	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/** @var string Custom form action */
	protected $u_action;

	/**
	* Constructor
	*
	* @param config						$config				Config object
	* @param db							$db					Database object
	* @param language					$language			Language object
	* @param log						$log				Log object
	* @param request					$request			Request object
	* @param template					$template			Template object
	* @param user						$user				User object
	* @access public
	*/
	public function __construct(
		config $config,
		db $db,
		language $language,
		log $log,
		request $request,
		template $template,
		user $user)
	{
		$this->config = $config;
		$this->db = $db;
		$this->language = $language;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
	}

	public function settings()
	{
		$this->language->add_lang('acp/common');
		$this->language->add_lang('auto_db_backup_acp', 'pico/autodbbackup');

		// Create a form key for preventing CSRF attacks
		add_form_key('acp_auto_db_backup');

		$errors = $filetypes = [];

		if (@extension_loaded('zlib'))
		{
			$filetypes[] = 'gzip';
		}

		if (@extension_loaded('bz2'))
		{
			$filetypes[] = 'bzip2';
		}

		$filetypes[] = 'text';

		foreach ($filetypes as $filetype)
		{
			$this->template->assign_block_vars('filetypes', array(
				'S_CHECKED'		=> ($this->config['auto_db_backup_filetype'] == $filetype) ? true : false,

				'FILETYPE'		=> $filetype,
			));
		}

		$backup_date = getdate($this->config['auto_db_backup_last_gc'] + $this->config['auto_db_backup_gc']);

		// Days
		for ($i = 1; $i < 32; $i++)
		{
			$this->template->assign_block_vars('days', array(
				'S_SELECTED'	=> ($i == $backup_date['mday']) ? true : false,
				'DAY'			=> $i,
			));
		}

		// Months
		for ($i = 1; $i < 13; $i++)
		{
			$this->template->assign_block_vars('months', array(
				'S_SELECTED'	=> ($i == $backup_date['mon']) ? true : false,
				'MONTH'			=> $i,
			));
		}

		// Years
		for ($i = date("Y"); $i < (date("Y") + 1); $i++)
		{
			$this->template->assign_block_vars('years', array(
				'S_SELECTED'	=> ($i == date("Y")) ? true : false,
				'YEAR'			=> $i,
			));
		}

		// Hours
		for ($i = 0; $i < 24; $i++)
		{
			$this->template->assign_block_vars('hours', array(
				'S_SELECTED'	=> ($i == $backup_date['hours']) ? true : false,
				'HOUR'			=> $i,
			));
		}

		// Minutes
		for ($i = 0; $i < 60; $i++)
		{
			$this->template->assign_block_vars('minutes', array(
				'S_SELECTED'	=> ($i == $backup_date['minutes']) ? true : false,
				'MINUTE'		=> $i,
			));
		}

		if ($this->request->is_set_post('submit'))
		{

			$auto_db_backup_gc = $this->request->variable('auto_db_backup_gc', 0);
			$auto_db_backup_copies = $this->request->variable('auto_db_backup_copies', 0);

			if (!check_form_key('acp_auto_db_backup'))
			{
				$errors[] = $this->user->lang('FORM_INVALID');
			}

			if ($auto_db_backup_gc <= 0)
			{
				$errors[] = $this->user->lang('AUTO_DB_BACKUP_FREQ_ERROR');
			}

			if ($auto_db_backup_copies < 0)
			{
				$errors[] = $this->user->lang('AUTO_DB_BACKUP_COPIES_ERROR');
			}

			$day = $this->request->variable('auto_db_backup_day', 0) - $this->config['auto_db_backup_gc'] / 86400;
			$month = $this->request->variable('auto_db_backup_month', 0);
			$year = $this->request->variable('auto_db_backup_year', 0);
			$hour = $this->request->variable('auto_db_backup_hour', 0);
			$minute = $this->request->variable('auto_db_backup_minute', 0);

			$backup_date = mktime($hour, $minute, 0, $month, $day, $year);

			if ($backup_date + $this->config['auto_db_backup_gc'] <= time())
			{
				$errors[] = $this->user->lang('AUTO_DB_BACKUP_TIME_ERROR');
			}

			if (empty($errors))
			{
				$this->config->set('auto_db_backup_enable', $this->request->variable('auto_db_backup_enable', 0));
				$this->config->set('auto_db_backup_filetype', $this->request->variable('auto_db_backup_filetype', 'text'));
				$this->config->set('auto_db_backup_gc', $this->request->variable('auto_db_backup_gc', 0) * 86400);
				$this->config->set('auto_db_backup_copies', $this->request->variable('auto_db_backup_copies', 0));
				$this->config->set('auto_db_backup_optimize', $this->request->variable('auto_db_backup_optimize', 0));
				$this->config->set('auto_db_backup_last_gc', $backup_date);

				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_AUTO_DB_BACKUP_SETTINGS_CHANGED');

				trigger_error($this->user->lang('AUTO_DB_BACKUP_SETTINGS_CHANGED') . adm_back_link($this->u_action));
			}
		}

		$optimize_allowed = in_array($this->db->get_sql_layer(), ['mysql4', 'mysqli']);

		$this->template->assign_vars(array(
			'S_ERROR'		=> (sizeof($errors)) ? true : false,
			'ERROR_MSG'		=> (sizeof($errors)) ? implode('<br />', $errors) : '',

			'S_AUTO_DB_BACKUP_ENABLE'		=> $this->config['auto_db_backup_enable'],
			'S_AUTO_DB_BACKUP_OPTIMIZE'		=> $this->config['auto_db_backup_optimize'],
			'S_OPTIMIZE_ALLOWED'			=> $optimize_allowed,

			'AUTO_DB_BACKUP_GC'			=> $this->config['auto_db_backup_gc'] / 86400,
			'AUTO_DB_BACKUP_COPIES'		=> $this->config['auto_db_backup_copies'],

			'U_ACTION'					=> $this->u_action,
		));
	}

	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
