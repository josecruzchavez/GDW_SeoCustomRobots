<?php
namespace GDW\SeoCustomRobots\Plugin;

use Magento\Cms\Model\Page;
use Magento\Framework\App\Request\Http;
use GDW\Core\Helper\Data as HelperData;
use Magento\Framework\View\Page\Config\Renderer;
use Magento\Framework\View\Page\Config as PageConfig;

class SeoRender
{
    protected $page;
    protected $request;
    protected $helpData;
    protected $pageConfig;

    public function __construct(
        Page $page,
        Http $request,
        HelperData $helpData,
        PageConfig $pageConfig
    )
    {
        $this->page = $page;
        $this->request = $request;
        $this->helperData = $helpData;
        $this->pageConfig = $pageConfig; 
    }

    public function beforeRenderMetadata(Renderer $subject)
    {
        $enableCustomRobots = $this->helperData->getConfigValue('gdw/seo/custom_robots') ?? 1;
        
        if($enableCustomRobots == 1){
        
            $noIndexArray = [];
            $fullActionname = $this->request->getFullActionName();
            $noIndexList = $this->helperData->getConfigValue('gdw/seo/custom_robots_list') ?? '';
            if($noIndexList != ''){$noIndexArray = explode("\n", str_replace("\r", "", $noIndexList));}
            
            switch ($fullActionname) {
                case 'catalog_product_view':
                        $product = $this->helperData->getCurrentProduct();
                        $this->pageConfig->setMetadata('robots', $product->getData('gdw_robots'));
                    break;
                case 'catalog_category_view':
                        $category = $this->helperData->getCurrentCategory();
                        $this->pageConfig->setMetadata('robots', $category->getData('gdw_robots'));
                    break;
                case 'cms_index_index': /* HomePage */
                        $this->pageConfig->setMetadata('robots', $this->page->getData('gdw_robots'));
                    break;
                case 'cms_page_view':
                        $this->pageConfig->setMetadata('robots', $this->page->getData('gdw_robots'));
                    break;
            }

            if(count($noIndexArray) > 0){
                if (in_array($fullActionname, $noIndexArray)) {
                    $this->pageConfig->setMetadata('robots', 'NOINDEX,FOLLOW');
                }
            }
        }        
    }
}
