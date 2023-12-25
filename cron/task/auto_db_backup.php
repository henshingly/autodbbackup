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

namespace pico\autodbbackup\cron\task;

/**
* @ignore
*/
use phpbb\config\config;
use phpbb\db\driver\driver_interface as db;
use phpbb\db\tools\tools_interface as db_tools;
use phpbb\log\log;
use phpbb\user;
use Symfony\Component\DependencyInjection\ContainerInterface;

class auto_db_backup extends \phpbb\cron\task\base
{
	protected $config;
	protected $db;
	protected $db_tools;
	protected $log;
	protected $user;
	/** @var ContainerInterface */
	protected $phpbb_container;
	protected $root_path;
	protected $php_ext;

	/**
	* Constructor.
	*/
	public function __construct(config $config, db $db, db_tools $db_tools, log $log, user $user, ContainerInterface $phpbb_container, $root_path, $php_ext)
	{
		$this->config = $config;
		$this->db = $db;
		$this->db_tools = $db_tools;
		$this->log = $log;
		$this->user = $user;
		$this->phpbb_container = $phpbb_container;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	* Runs this cron task.
	*
	* @return null
	*/
	public function run()
	{
		// this is required for the get_usable_memory function
		include($this->root_path . 'includes/acp/acp_database.' . $this->php_ext);

		$backup_date = getdate($this->config['auto_db_backup_last_gc']);
		$last_backup_date = mktime($backup_date['hours'], $backup_date['minutes'], 0, date("m"), date("j"), date("Y"));

		$this->config->set('auto_db_backup_last_gc', $last_backup_date, false);

		// Optimize database tables before backup them (only unoptimized tables)
		if ($this->config['auto_db_backup_optimize'])
		{
			if ($result = $this->db->sql_query('SHOW TABLE STATUS'))
			{
				$tables = $this->db->sql_fetchrowset($result);
				$size = sizeof($tables);

				for ($i = 0; $i < $size; $i++)
				{
					if ($tables[$i]['Data_free'] != 0)
					{
						$for_optimize[] = $tables[$i]['Name'];
					}
				}

				if (!empty($for_optimize))
				{
					$tables = implode(',', $for_optimize);
					$this->db->sql_query('OPTIMIZE TABLE ' . $tables);
				}
			}
		}

		@set_time_limit(1200);
		@set_time_limit(0);

		$time = time();
		$format = $this->config['auto_db_backup_filetype'];
		$filename = 'backup_' . $time . '_' . unique_id();

		/** @var phpbb\db\extractor\extractor_interface $extractor Database extractor */
		$extractor = $this->phpbb_container->get('dbal.extractor');
		$extractor->init_extractor($format, $filename, $time, false, true);

		global $table_prefix;

		$tables = $this->db_tools->sql_list_tables();

		$extractor->write_start($table_prefix);

		foreach ($tables as $table_name)
		{
			$extractor->write_table($table_name);
			$extractor->write_data($table_name);
		}

		$extractor->write_end();

		// Delete backup
		if ($this->config['auto_db_backup_copies'])
		{
			$rep = $this->root_path . 'store/';
			$dir = opendir($rep);
			$files = array();
			while (($file = readdir($dir)) !== false)
			{
				if (is_file($rep . $file) && (substr($file, -3) == '.gz' || substr($file, -4) == '.bz2' || substr($file, -4) == '.sql' ))
				{
					$files[$file] = fileatime($rep . $file);
				}
			}
			closedir($dir);

			arsort($files);
			reset($files);

			if (sizeof($files) > $this->config['auto_db_backup_copies'])
			{
				$i = 0;
				foreach ($files as $key => $value)
				{
					$i++;
					if ($i > $this->config['auto_db_backup_copies'])
					{
						unlink($rep . $key);
					}
				}
			}
		}

		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_AUTO_DB_BACKUP');
	}

	/**
	* Returns whether this cron task can run, given current board configuration.
	*
	* @return bool
	*/
	public function is_runnable()
	{
		return (bool) $this->config['auto_db_backup_enable'];
	}

	/**
	* Returns whether this cron task should run now, because enough time
	* has passed since it was last run.
	*
	* @return bool
	*/
	public function should_run()
	{
		return $this->config['auto_db_backup_last_gc'] < time() - $this->config['auto_db_backup_gc'];
	}
}
