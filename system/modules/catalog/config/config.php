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
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['ym'], 1, array
(
	'catalog' => array
	(
		'tables'      => array('tl_catalog_categories_settings', 'tl_catalog_categories_localization', 'tl_catalog_items_settings', 'tl_catalog_items_localization'),
		'icon'        => 'system/modules/catalog/assets/img/menu.png',
		// 'table'       => array('TableWizard', 'importTable'),
		// 'list'        => array('ListWizard', 'importList')
	)
));


/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 2, array
(
	'ym' => array
	(
		'categoryList' => 'CategoriesList',
		'productsList' => 'ProductsList',
		'productView'  => 'ProductView',
	)
));


/**
 * Cron jobs
 */

/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'catalog';
