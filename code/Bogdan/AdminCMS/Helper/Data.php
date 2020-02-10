<?php

namespace Bogdan\AdminCMS\Helper;

use Magento\Customer\Helper\View as CustomerViewHelper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /** System config xml paths */

    const BANNER_BACKGROUND_PATH = 'banner_section/banner_data/banner_background';

    protected $_storeManager;
    protected $_objectManager;
    protected $_customerViewHelper;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param CustomerViewHelper $customerViewHelper
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        CustomerViewHelper $customerViewHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\ObjectManagerInterface $objectManager
    )
    {
        $this->_customerSession = $customerSession;
        $this->_customerViewHelper = $customerViewHelper;
        parent::__construct($context);
        $this->_storeManager = $storeManager;
        $this->_objectManager = $objectManager;
    }

    private function getCurrentStoreId()
    {
        return $this->_storeManager->getStore();
    }

    public function getBannerBackground()
    {
        return $this->scopeConfig->getValue(self::BANNER_BACKGROUND_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }
}
