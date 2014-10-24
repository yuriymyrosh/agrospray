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
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\CatalogHelper' => 'system/modules/catalog/classes/CatalogHelper.php',

	// Models
	'Contao\CatalogCategoriesModel'         => 'system/modules/catalog/models/CatalogCategoriesModel.php',
	'Contao\CatalogCategoriesSettingsModel' => 'system/modules/catalog/models/CatalogCategoriesSettingsModel.php',
	'Contao\CatalogItemsSettingsModel'      => 'system/modules/catalog/models/CatalogItemsSettingsModel.php',
	'Contao\CatalogItemsModel'      => 'system/modules/catalog/models/CatalogItemsModel.php',

	// Modules
	'Contao\FECatalog'      => 'system/modules/catalog/modules/FECatalog.php',
	'Contao\CategoriesList' => 'system/modules/catalog/modules/CategoriesList.php',
	'Contao\ProductsList'   => 'system/modules/catalog/modules/ProductsList.php',
	'Contao\ProductView'    => 'system/modules/catalog/modules/ProductView.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'fe_categories_list' => 'system/modules/catalog/templates',
	'fe_products_list'   => 'system/modules/catalog/templates',
	'fe_product_view'    => 'system/modules/catalog/templates',
	'fe_empty'           => 'system/modules/catalog/templates',
));
