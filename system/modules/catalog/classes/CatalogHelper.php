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


/**
 * Class Calendar
 *
 * Provide methods regarding calendars.
 * @copyright  Leo Feyer 2005-2014
 * @author     Konro1 <yuriymyrosh@gmail.com>
 * @package    Catalog
 */
class CatalogHelper extends \Backend
{

    public function getLocal()
    {
        $array = array();
        $db = $this->Database->execute(" SELECT language, title FROM tl_page WHERE type = 'root' ");
            
        while ( $db->next() ) 
        {
            $array[$db->language] = $db->title;
        }
            
        return $array;
    }

    public static function getTopCategoriesList()
    {
        $array = $GLOBALS['TL_LANG']['MSC']['catalog']['top_categories'];
    
            
        return $array;
    }

     public static function getTopCategories()
    {
        $array = array();
        $cats = $GLOBALS['TL_LANG']['MSC']['catalog']['top_categories'];
        foreach ($cats as $key => $value) 
        {
            $array[$key] = $value['title'];
        }
            
        return $array;
    }

    /**
     * [0] - top_category
     * [1] - title
     */
    public function categoryLabelCallback($items,$xz, $dc, $row)
    {
        $row[0] = self::getTopCategoryTitle($row[0]);
        return $row; 
    }

    public static function getTopCategoryTitle($top_id)
    {
        return $GLOBALS['TL_LANG']['MSC']['catalog']['top_categories'][$top_id]['title'];
    }

}
?>