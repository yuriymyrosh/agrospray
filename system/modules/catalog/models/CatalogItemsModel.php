<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Calendar
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;


class CatalogItemsModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable      = 'tl_catalog_items_settings';
	protected static $strTableLocal = 'tl_catalog_items_localization';


	/**
	 * Find a published event from one or more calendars by its ID or alias
	 *
	 * @param mixed $varId      The numeric ID or alias name
	 * @param array $arrPids    An array of calendar IDs
	 * @param array $arrOptions An optional options array
	 *
	 * @return \Model|null The model or null if there is no event
	 */
	public static function findPublishedByIdOrAlias($varId, $arrOptions=array())
	{
		$t = static::$strTable;

		$arrColumns = array("($t.id=? OR $t.alias=?) AND published = 1");

		return static::findOneBy($arrColumns, array((is_numeric($varId) ? $varId : 0), $varId), $arrOptions);
	}

	/**
	 * Find a published event from one or more calendars by its ID or alias
	 *
	 * @param mixed $varId      The numeric ID or alias name
	 * @param array $arrPids    An array of calendar IDs
	 * @param array $arrOptions An optional options array
	 *
	 * @return \Model|null The model or null if there is no event
	 */
	public static function findAllByPid($pid, $arrColumns=array(), $arrOptions=array())
	{
		$t = static::$strTable;
		$l = static::$strTableLocal;
		if ($pid) 
		{
			$arrColumns[] = "$t.pid = $pid";
		}

		$collection = static::findBy($arrColumns, $pid, $arrOptions);
 
		return $collection;
	}
}
