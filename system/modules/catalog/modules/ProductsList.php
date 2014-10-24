<?php

namespace Contao;

/**
* Category controller
*/

class ProductsList extends FECatalog
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'fe_products_list';

    /**
     * Display a wildcard in the back end
     *
     * @access public
     * @return string
     */
    public function generate() {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### MODULE PRODUCTS LIST ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate module
     */
    protected function compile()
    {
        global $objPage;
        $jump_to = PageModel::findPublishedById($this->jumpTo)->alias;
        $pid = Input::get('auto_item');
        $category = CatalogCategoriesModel::findOneBy(array("id = '$pid' OR alias = '$pid'"),array('limit 1'));

        if ($category)
        {
            $category_lang = $this->getLang($category->id, 'catalog_categories');

            $seo_title = $category->title;
            $seo_title = $category_lang['title'] ? $category_lang['title'] : $seo_title;
            $seo_title = $category_lang['seo_title'] ? $category_lang['seo_title'] : $seo_title;

            $objPage->title = $seo_title;
            $objPage->description = $category_lang['seo_description'];
            $GLOBALS['TL_KEYWORDS'] = $category_lang['seo_keywords'];
        }

        $products = CatalogItemsModel::findAllByPid($category->id, array('published = 1'), array('ORDER BY sorting'));

        if (!$products)
        {
            $this->Template = new FrontendTemplate('fe_empty');
        }
        else
        {
            $items = array();
            foreach ($products as $item)
            {

                $local = $this->getLang($item->id, 'catalog_items');
                $alias = $item->alias ? $item->alias : $item->id;

                $items[] = array(
                    'title' => $local['title'] ? $local['title'] : $item->title,
                    'href' => $this->generateFrontendUrl(array(),$jump_to.'/'.$alias),
                    'photo' => Image::get(\FilesModel::findByUuid($item->main_photo)->path, 250,220, 'center-center'),
                    );

            }
            $this->Template->items = $items;
            $this->Template->lang = $GLOBALS['TL_LANG']['MSC']['catalog']['product'];
        }

    }
}
?>