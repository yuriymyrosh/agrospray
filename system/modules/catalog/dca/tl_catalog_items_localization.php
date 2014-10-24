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
 **/


/**
 * Table tl_catalog_items_localization 
 */
$GLOBALS['TL_DCA']['tl_catalog_items_localization'] = array
(

    // Config
    'config' => array
    (

        'dataContainer'     =>  'Table',
        'enableVersioning'  =>  true,
        'ptable'            =>  'tl_catalog_items_settings',
        'sql'               =>  array
        (
         'keys' => array
         (
            'id' => 'primary'
            )
         )
        ),
    'list' => array
    (
        'sorting' => array
        (
            'mode' => 2,
            'fields' => array('title'),
            'flag' => 1,
            'panelLayout' => 'filter;search,sort,limit',
            ),
        'label' => array
        (
            'fields' => array('title', 'language'),
            'showColumns' => true

            ),
        'operations' => array
        (
            'edit' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
                ),
            'delete' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
                ),
            'show' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
                ),
            )
        ),
'palettes' => array
(
    'default'   => '{tip_general:hide},language,title,description;{tip_seo:hide},seo_title,seo_description,seo_keywords;',
    ),
    // Fields
'fields' => array
(
  'id' => array
  (
     'sql'                     => "int(10) unsigned NOT NULL auto_increment"
     ),

  'pid' => array
  (
     'sql'                     => "int(10) unsigned NOT NULL default '0'"
     ),

  'tstamp' => array
  (
     'sql'                     => "int(10) unsigned NOT NULL default '0'"
     ),

  'language' => array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['language'],
    'inputType'               => 'select',
    'default'                 => '1',
    'options_callback'        => array('CatalogHelper','getLocal'),
    'eval'                    => array('chosen'=>true),
    'sql'                     => "varchar(255) NOT NULL default ''"
    ),
  'title' => array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['title'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'sql'                     => "varchar(255) NOT NULL default ''"
    ),
  'description' => array
  (
    'label'     => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['description'],
    'exclude'   => true,
    'inputType' => 'textarea',
    'eval'      => array('rte' => 'tinyMCE'),
    'sql'       => "text NULL"
    ),
  'seo_title' => array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['seo_title'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'sql'                     => "varchar(255) NOT NULL default ''"
    ),
  'seo_description' => array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['seo_description'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'textarea',
    'sql'                     => "text NULL"
    ),
  'seo_keywords' => array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_catalog_items_localization']['seo_keywords'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
    ),
  )
);
?>