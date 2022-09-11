<?php
namespace GDW\SeoCustomRobots\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();
        
        $cmsPage = $setup->getTable('cms_page');

        if ($connection->tableColumnExists($cmsPage, 'gdw_robots') === false) {
            $connection->addColumn($cmsPage,'gdw_robots', ['type' => 'text', 'nullable' => true, 'comment' => 'Custom metatag Robot for CMS']);
        }

        $installer->endSetup();
    }
}
