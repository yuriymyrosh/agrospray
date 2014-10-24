<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @project   Catalog
 * @package   catalog
 * @author    Konro1 
 * @license   LGPL 
 * @copyright Konro1 2015
 * 
 * */
/**
 * Table tl_catalog_categories_settings 
 */
$GLOBALS['TL_DCA']['tl_catalog_categories_settings'] = array(
    // Config
    'config'   => array(
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'ctable'           => array( 'tl_catalog_categories_localization' ),
        'sql'              => array(
            'keys' => array(
                'id' => 'primary'
                )
            ),
//        'onload_callback' => array(array('Countries','checkUkraine')),
        ),
    'list'     => array(
        'sorting'    => array(
            'mode'        => 2,
            'fields'      => array( 'top_category','title' ),
            'flag'        => 1,
            'panelLayout' => 'filter;search,sort,limit',
            ),
        'label'      => array(
            'fields'         => array( 'top_category','title' ),
            'label_callback' => array('CatalogHelper','categoryLabelCallback'),
            'showColumns'    => true,
            ),
        'operations' => array(
            'edit'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
                ),
            'delete' => array(
                'label'      => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
                ),
            'items'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['items'],
                'href'  => 'table=tl_catalog_items_settings',
                'icon'  => 'system/modules/catalog/assets/img/menu-2.png'
                ),
            'local'  => array(
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['local'],
                'href'  => 'table=tl_catalog_categories_localization',
                'icon'  => 'system/modules/catalog/assets/img/lang.png'
                ),
            )
),
'palettes' => array(
    'default' => '{tip_general:hide},top_category,title,alias;{tip_options:hide},sorting,published;',
    ),
    // Fields
'fields'   => array(
    'id'          => array(
        'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
    'pid'         => array(
        'sql' => "int(10) unsigned NOT NULL"
        ),
    'tstamp'      => array(
        'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
    'top_category' => array(
        'label'            => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['top_category'],
        'inputType'        => 'select',
        'default'          => '1',
        'options_callback' => array('CatalogHelper','getTopCategories'),
        'eval'             => array('chosen'=>true, 'tl_class' => 'w50'),
        'sql'              => "varchar(255) NOT NULL default ''"
        ),
    'title'   => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['title'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class' => 'w50'),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),
    'alias' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['alias'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class'=>'w50', 'unique' => true, 'spaceToUnderscore' => true),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),
    'sorting'   => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['sorting'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class' => 'w50', 'rgxp' => 'digit'),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),

    'published' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_categories_settings']['published'],
        'exclude'   => true,
        'flag'      => 1,
        'inputType' => 'checkbox',
        'eval'      => array( 'doNotCopy' => true ),
        'sql'       => "char(1) NOT NULL default ''"
        )
    )
);
?>