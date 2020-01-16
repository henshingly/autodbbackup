<?php
/**
*
* @package Auto db Backup
* @copyright (c) 2015 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\autodbbackup\core;

use phpbb\extension\manager;
use phpbb\exception\version_check_exception;

/**
* functions
*/
class functions
{
	/** @var \phpbb\extension\manager */
	protected $phpbb_extension_manager;

	/**
	* Constructor for functions
	*
	* @param \phpbb\extension\manager 	$phpbb_extension_manager	Extension manager
	*
	* @access public
	*/
	public function __construct(manager $phpbb_extension_manager)
	{
		$this->ext_manager	= $phpbb_extension_manager;

		$this->namespace	= __NAMESPACE__;
	}

	/**
	* Get the extension's namespace
	*
	* @return $extension_name
	* @access public
	*/
	public function get_ext_namespace($mode = 'php')
	{
		// Let's extract the extension name from the namespace
		$extension_name = substr($this->namespace, 0, -(strlen($this->namespace) - strrpos($this->namespace, '\\')));

		// Now format the extension name
		switch ($mode)
		{
			case 'php':
				$extension_name = str_replace('\\', '/', $extension_name);
			break;

			case 'twig':
				$extension_name = str_replace('\\', '_', $extension_name);
			break;
		}

		return $extension_name;
	}

	/**
	* Check if there is an updated version of the extension
	*
	* @return $new_version
	* @access public
	*/
	public function version_check()
	{
		$port = ($this->get_meta('ssl')) ? 443 : 80;

		// Can we access the version srver?
		if (@fsockopen(($port == 443 ? 'ssl://' : '') . $this->get_meta('host'), $port, $errno, $errstr, 2))
		{
			try
			{
				$md_manager 	= $this->ext_manager->create_extension_metadata_manager($this->get_ext_namespace());
				$version_data	= $this->ext_manager->version_check($md_manager, true);
			}
			catch (version_check_exception $e)
			{
				$version_data['current'] = 'fail';
			}
		}
		else
		{
			$version_data['current'] = 'fail';
		}

		return $version_data;
	}

	/**
	* Get a meta_data key value
	*
	* @return $meta_data
	* @access public
	*/
	public function get_meta($data)
	{
		$meta_data	= '';
		$md_manager = $this->ext_manager->create_extension_metadata_manager($this->get_ext_namespace());

		foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($md_manager->get_metadata('all'))) as $key => $value)
		{
			if ($data === $key)
			{
				$meta_data = $value;
			}
		}

		return $meta_data;
	}

	/**
	* Get the UTC timezone offset from server time
	*
	* @return utc_offset
	* @access public
	*/
	public function get_utc_offset()
	{
		$utc_dtz	= new \DateTimeZone('UTC');
		$php_dtz 	= new \DateTimeZone(ini_get('date.timezone'));
		$utc_dt 	= new \DateTime('now', $utc_dtz);
		$php_dt 	= new \DateTime('now', $php_dtz);

		return ($php_dtz->getOffset($php_dt) - $utc_dtz->getOffset($utc_dt));
	}
}
