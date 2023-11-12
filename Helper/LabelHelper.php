<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_ComingSoonProduct
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\ComingSoonProduct\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class LabelHelper
 */
class LabelHelper extends AbstractHelper
{
    const XML_CONFIG_IS_ENABLE = "comingSoon/general/enable";
    const XML_CONFIG_LABEL = "comingSoon/general/label";

    /**
     * @var Context
     */
    protected Context $_scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected StoreManagerInterface $_storeManager;

    /**
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context      $context,
        StoreManagerInterface $storeManager
    ) {
        $this->_scopeConfig = $context;
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnable()
    {
        return (bool) $this->scopeConfig->getValue(self::XML_CONFIG_IS_ENABLE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @param $product
     * @return mixed
     */
    public function getComingSoonLabel($product)
    {
        $comingSoonLabel = $product->getCustomAttribute('coming_soon_label');
        if ($comingSoonLabel) {
            return $comingSoonLabel->getValue();
        }
        return $this->scopeConfig->getValue(self::XML_CONFIG_LABEL, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @param $product
     * @return \DateTime|string
     * @throws \Exception
     */
    public function verifyComingSoonDate($product)
    {
        $comingSoonDate = $product->getCustomAttribute('coming_soon_date');
        if ($comingSoonDate) {
            $comingSoonDate = $comingSoonDate->getValue();
            $formattedDate = new \DateTime($comingSoonDate);
            $formattedDate->format("Y-m-d H:i:s");

            $today = new \DateTime();
            $today->format("Y-m-d H:i:s");
            if ($formattedDate > $today) {
                return $formattedDate->format('M d, Y H:i:s');
            }
        }
        return '';
    }
}
