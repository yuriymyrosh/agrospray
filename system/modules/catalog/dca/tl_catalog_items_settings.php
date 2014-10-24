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
 * Table tl_catalog_items_settings 
 */
$GLOBALS['TL_DCA']['tl_catalog_items_settings'] = array(
    // Config
    'config'   => array(
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'ptable'           => 'tl_catalog_categories_settings',
        'ctable'           => array( 'tl_catalog_items_localization' ),
        'sql'              => array(
            'keys' => array(
                'id' => 'primary'
                )
            ),
        ),
    'list' => array(
        'sorting'    => array(
            'mode'        => 2,
            'fields'      => array( 'sorting','title' ),
            'flag'        => 1,
            'panelLayout' => 'filter;search,sort,limit',
            ),
        'label' => array(
            'fields'      => array( 'title' ),
            'showColumns' => true,
            ),
        'operations' => array(
            'edit'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
                ),
            'delete' => array(
                'label'      => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
                ),
            'local'  => array(
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['local'],
                'href'  => 'table=tl_catalog_items_localization',
                'icon'  => 'system/modules/catalog/assets/img/lang.png'
                ),
            )
        ),
'palettes' => array(
    'default' => '{tip_general:hide},title,alias,price;{tip_photos:hide},main_photo,photos;{tip_options:hide},sorting,published;',
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
    'title'   => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['title'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class' => 'w50'),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),
    'alias' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['alias'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class'=>'w50', 'unique' => true, 'spaceToUnderscore' => true),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),
    'price'   => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['price'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class' => 'w50', 'rgxp' => 'digit'),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),
    'main_photo' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['main_photo'],
        'inputType' => 'fileTree',
        'exclude'   => true,
        'eval'      => array( 'fieldType' => 'radio', 'multiple' => false, 'files' => true, 'filesOnly' => true,),
        'sql'       => "binary(16) NULL"
        ),
    'photos' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['photos'],
        'inputType' => 'fileTree',
        'eval'      => array( 'fieldType' => 'checkbox', 'multiple' => true, 'filesOnly' => true),
        'sql'       => "binary(255) NULL"
        ),
    'sorting'   => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['sorting'],
        'exclude'   => true,
        'search'    => true,
        'inputType' => 'text',
        'eval'      => array('tl_class' => 'w50', 'rgxp' => 'digit'),
        'sql'       => "varchar(255) NOT NULL default ''"
        ),
    'published' => array(
        'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_settings']['published'],
        'exclude'   => true,
        'flag'      => 1,
        'inputType' => 'checkbox',
        'eval'      => array( 'doNotCopy' => true ),
        'sql'       => "char(1) NOT NULL default ''"
        )
    )
);
?>