<?php
namespace GDW\SeoCustomRobots\Plugin;

use Magento\Cms\Model\Page;
use Magento\Framework\App\Request\Http;
use GDW\Core\Helper\Data as HelperData;
use Magento\Framework\View\Page\Config\Renderer;
use Magento\Framework\View\Page\Config as PageConfig;

class SeoRender
{
    protected Page $page;
    protected Http $request;
    protected HelperData $helperData;
    protected PageConfig $pageConfig;

    public function __construct(
        Page $page,
        Http $request,
        HelperData $helperData,
        PageConfig $pageConfig
    )
    {
        $this->page = $page;
        $this->request = $request;
        $this->helperData = $helperData;
        $this->pageConfig = $pageConfig; 
    }

    public function beforeRenderMetadata(Renderer $subject): void
    {
        $enableCustomRobots = $this->helperData->getConfigValue('gdw/seo_robots/enable') ?? 1;
        
        if($enableCustomRobots == 1){
        
            $noIndexArray = [];
            $fullActionname = $this->request->getFullActionName();
            $noIndexList = $this->toString($this->helperData->getConfigValue('gdw/seo_robots/custom_robots_list') ?? '');
            if($noIndexList != ''){$noIndexArray = explode("\n", str_replace("\r", "", $noIndexList));}
            
            switch ($fullActionname) {
                case 'catalog_product_view':
                        $product = $this->helperData->getCurrentProduct();
                        if ($product !== null) {
                            $robots = $product->getCustomAttribute('gdw_robots');
                            $this->pageConfig->setMetadata('robots', $this->toString($robots ? $robots->getValue() : null));
                        }
                    break;
                case 'catalog_category_view':
                        $category = $this->helperData->getCurrentCategory();
                        if ($category !== null) {
                            $robots = $category->getCustomAttribute('gdw_robots');
                            $this->pageConfig->setMetadata('robots', $this->toString($robots ? $robots->getValue() : null));
                        }
                    break;
                case 'cms_index_index': /* HomePage */
                        $this->pageConfig->setMetadata('robots', $this->toString($this->page->getData('gdw_robots')));
                    break;
                case 'cms_page_view':
                        $this->pageConfig->setMetadata('robots', $this->toString($this->page->getData('gdw_robots')));
                    break;
            }

            if(count($noIndexArray) > 0){
                if (in_array($fullActionname, $noIndexArray)) {
                    $this->pageConfig->setMetadata('robots', 'NOINDEX,FOLLOW');
                }
            }
        }        
    }

    private function toString(mixed $value): string
    {
        return is_scalar($value) ? (string) $value : '';
    }
}
