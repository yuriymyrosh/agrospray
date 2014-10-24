<?php

namespace Contao;

/**
* Category controller
*/

class ProductView extends FECatalog
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'fe_product_view';

    /**
     * Display a wildcard in the back end
     *
     * @access public
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### MODULE PRODUCT VIEW ###';
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

        $item = CatalogItemsModel::findByIdOrAlias(Input::get('auto_item'));
        if (!$item->published || !Input::get('auto_item'))
        {
            $objHandler = new $GLOBALS['TL_PTY']['error_404']();
            $objHandler->generate($objPage->id);
        }

        $photos = array();

        $i = 0;
        foreach (unserialize($item->photos) as $photo)
        {
            if ($i == 0)
            {
                $width = 240;
            }
            else
            {
                $width = 120;
            }

            $photos[] = array(
                'thumb' => Image::get(\FilesModel::findByUuid($photo)->path, null, $width, 'center-center'),
                'big' => Image::get(\FilesModel::findByUuid($photo)->path, null, null, 'center-center'),
            );
            $i++;
        }

        $local = $this->getLang($item->id,'catalog_items');

        $seo_title = $item->title;
        $seo_title = $local['title'] ? $local['title'] : $seo_title;
        $seo_title = $local['seo_title'] ? $local['seo_title'] : $seo_title;

        $objPage->title = $seo_title;
        $objPage->description = $local['seo_description'];
        $GLOBALS['TL_KEYWORDS'] = $local['seo_keywords'];

        $this->Template->lang = $GLOBALS['TL_LANG']['MSC']['catalog']['product'];
        $this->Template->item = array(
            'title'       => $local['title'] ? $local['title'] : $item->title,
            'description' => $local['description'],
            'photo'       => Image::get(\FilesModel::findByUuid($item->main_photo)->path, 400,300, 'center-center'),
            'photos'      => $photos,
        );
    }
}
?>