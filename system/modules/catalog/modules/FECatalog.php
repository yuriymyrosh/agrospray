<?php

/**
 * Coin Slider
 * jQuery Image Slider for Contao
 *
 * @author    Lionel Maccaud
 * @copyright Lionel Maccaud
 * @package   coinSlider
 * @license   MIT (http://lionel-m.mit-license.org/)
 */
/**
 * Run in a custom namespace, so the class can be replaced
 */

namespace Contao;

/**
 * Class Catalog
 *
 * @copyright  Konro1 2014
 * @author     Yuriy Myrosh
 * @package    Catalog
 */
class FECatalog extends \Module
{

    protected function compile()
    {
        
    }

    public function getLang( $id, $table, $fields = '*', $local = '' )
    {
        $local = empty($local) ? $GLOBALS['TL_LANGUAGE'] : $local;
        
        $db = $this->Database->execute(" SELECT " . $fields . " FROM tl_" . $table . "_localization WHERE pid = " . $id . " AND language = '" . $local . "' ")->fetchAssoc();

        return $db;
    }

}

?>