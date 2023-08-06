<?php
/**
*
* @package Auto database backup
* @copyright (c) 2023 Rich McGirr(RMcGirr83)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace pico\autodbbackup;

/**
* Extension class for custom enable/disable/purge actions
*/
class ext extends \phpbb\extension\base
{
	/**
	 * Enable extension if phpBB and PHP version requirement is met
	 *
	 * @return bool
	 * @access public
	 */
	public function is_enableable()
	{
		$enableable = (phpbb_version_compare(PHPBB_VERSION, '3.3', '>=') && version_compare(PHP_VERSION, '7.4.*', '>'));
		if (!$enableable)
		{
			$user = $this->container->get('user');
			$user->add_lang_ext('pico/autodbbackup', 'auto_db_backup_acp');
			trigger_error($user->lang('AUTODBBACKUP_REQUIRE'), E_USER_WARNING);
		}

		return $enableable;
	}
}
