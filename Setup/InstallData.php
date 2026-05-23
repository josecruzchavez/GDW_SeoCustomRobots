<?php

namespace GDW\SeoCustomRobots\Setup;

use Magento\Catalog\Setup\CategorySetup;
use Magento\Eav\Model\Config;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Category;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class InstallData implements InstallDataInterface
{
    protected Config $eavConfig;
    protected ObjectManagerInterface $objectManager;
    
    public function __construct(
        Config $eavConfig,
        ObjectManagerInterface $objectManager
    ) {
        $this->eavConfig = $eavConfig;
        $this->objectManager = $objectManager;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context): void
    {
        $setup->startSetup();
        
        /* Product attributes */
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->objectManager->create(EavSetup::class, ['setup' => $setup]);

        if (!$this->isAttributeExists(Product::ENTITY, 'gdw_robots')) {
            $eavSetup->addAttribute(Product::ENTITY, 'gdw_robots', [
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Robots',
                'input' => 'select',
                'class' => '',
                'source' => 'GDW\SeoCustomRobots\Model\Robots',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'unique' => false,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'is_used_in_grid' => true,
                'is_filterable_in_grid' => true,
                'apply_to' => 'simple,configurable,bundle,virtual',
                'group' => 'Search Engine Optimization'
            ]);
        }
            
        /* Category attribute */
        /** @var CategorySetup $categorySetup */
        $categorySetup = $this->objectManager->create(CategorySetup::class, ['setup' => $setup]);
 
        if (!$this->isAttributeExists(Category::ENTITY, 'gdw_robots')) {
            $categorySetup->addAttribute(Category::ENTITY, 'gdw_robots', 
                [
                    'type'      => 'varchar',
                    'label'     => 'Robots',
                    'input'     => 'select',
                    'sort_order' => 302,
                    'source'    => '',
                    'global'    => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible'   => true,
                    'required'  => false,
                    'user_defined' => true,
                    'default'   => null,
                    'group'     => 'Search Engine Optimization',
                    'backend'   => ''
                ]);
        }

        $setup->endSetup();
    }

    public function isAttributeExists(string $type, string $field): bool
    {
        $attr = $this->eavConfig->getAttribute($type, $field);
        return (bool) $attr->getId();
    }
}
