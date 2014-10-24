<?php

namespace Contao;

/**
* Category controller
*/

class CategoriesList extends FECatalog
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'fe_categories_list';

    /**
     * Active category id
     * @var int
     */
    private $activeCatId = 0;

    /**
     * Display a wildcard in the back end
     *
     * @access public
     * @return string
     */
    public function generate() {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### MODULE CATEGORY MENU ###';
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
        $top_categories = CatalogHelper::getTopCategoriesList();
        $data = array();

        global $objPage;
        if ($objPage->alias != PageModel::findPublishedById($this->jumpTo)->alias)
        {
            $category_page = $objPage->alias;
        }
        else
        {
            $category_page = PageModel::findPublishedById(PageModel::findPublishedById($this->jumpTo)->pid)->alias;
        }

        if (Input::get('auto_item'))
        {
            $this->activeCatId = $this->_get_active_cat_id();
            $active = CatalogCategoriesModel::findByPk($this->activeCatId);
            $category_lang = $this->getLang($active->id, 'catalog_categories');

            $seo_title = $active->title;
            $seo_title = $category_lang['title'] ? $category_lang['title'] : $seo_title;
            $seo_title = $category_lang['seo_title'] ? $category_lang['seo_title'] : $seo_title;

            $objPage->title = $seo_title;
            $objPage->description = $category_lang['seo_description'];
            $GLOBALS['TL_KEYWORDS'] = $category_lang['seo_keywords'];
        }

        foreach ($top_categories as $id => $category)
        {
            $sub = $this->_get_subcats($id, $category_page);
            $data[$id] = array(
                'title' => $category['title'],
                'sub' => $sub,
            );
        }
        $this->Template->categories = $data;
    }

    private function _get_subcats($pid, $category_page)
    {
        $result = array();

        $collection = CatalogCategoriesModel::findPublishedByPid($pid, array('ORDER BY sorting'));
        if (!$collection) return $result;

        foreach ($collection as $item)
        {
            $local = $this->getLang($item->id, 'catalog_categories');
            $alias = $item->alias ? $item->alias : $item->id;
            $result[] = array(
                'title'     => $local['title'] ? $local['title'] : $item->title,
                'is_active' => $this->activeCatId == $item->id ? true : false,
                'href'      => $this->generateFrontendUrl(array(), $category_page.'/'.$alias),
            );
        }

        return $result;
    }

    private function _get_active_cat_id()
    {
        global $objPage;

        $cat = CatalogCategoriesModel::findByIdOrAlias(Input::get('auto_item'));
        $result = $cat->id;
        if ($objPage->id == $this->jumpTo)
        {
            $item = CatalogItemsModel::findByIdOrAlias(Input::get('auto_item'));
            $result = $item->pid;
        }

        return $result;
    }
}
?>