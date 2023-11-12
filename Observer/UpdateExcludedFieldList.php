<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_ComingSoonProduct
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\ComingSoonProduct\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class UpdateExcludedFieldList implements ObserverInterface
{
    const ATTRIBUTE_CODE = 'coming_soon_date';

    /**
     * Set coming_soon_date field as not used in mass update
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $block = $observer->getEvent()->getObject();
        $list = $block->getFormExcludedFieldList();
        $list[] = self::ATTRIBUTE_CODE;
        $block->setFormExcludedFieldList($list);
    }
}
