<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_ComingSoonProduct
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\ComingSoonProduct\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;

/**
 * Class ComingSoonAttributes
 */
class ComingSoonAttributes implements DataPatchInterface
{
    const PROD_ATTR_COMING_SOON_DATE = "coming_soon_date";

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory          $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return void
     * @throws LocalizedException
     * @throws \Magento\Framework\Validator\ValidateException
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_COMING_SOON_DATE)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_COMING_SOON_DATE, [
                'group' => 'General',
                'type' => 'datetime',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\DateTime',
                'frontend' => '',
                'label' => 'Coming Soon Date',
                'note' => 'Date after which add to cart button is visible on storefront',
                'input' => 'datetime',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]);
        }
    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
