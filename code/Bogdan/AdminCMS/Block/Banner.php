<?php

namespace Bogdan\AdminCMS\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class Banner extends Template {

    /** System config xml paths */
    const BANNER_IMAGE_PATH = 'banner_section/banner_data/banner_image';
    const BANNER_DESCRIPTION_PATH = 'banner_section/banner_data/banner_description';
    const BANNER_TITLE_PATH = 'banner_section/banner_data/banner_title';
    const BANNER_BACKGROUND_PATH = 'banner_section/banner_data/banner_background';
    const BANNER_LINK_PATH = 'banner_section/banner_data/banner_link';

    private function getCurrentStoreId() {
        return $this->_storeManager->getStore();
    }

    protected function getFullPath($relativePath)
    {
        if (!$relativePath) {
            return '';
        }

        return $this->_urlBuilder->getBaseUrl(['_type' => 'media', '_secure' => $this->getRequest()->isSecure()])
            . 'theme/' . $relativePath;
    }

    public function bannerDescr() {
        return $this->_scopeConfig->getValue(self::BANNER_DESCRIPTION_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }

    public function bannerTitle() {
        return $this->_scopeConfig->getValue(self::BANNER_TITLE_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }

    public function bannerBackground() {
        return $this->_scopeConfig->getValue(self::BANNER_BACKGROUND_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }

    public function bannerLink() {
        return $this->_scopeConfig->getValue(self::BANNER_LINK_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }

    public function getBannerImage()
    {
        return $this->getFullPath($this->bannerImage());

    }

    public function bannerImage() {
        return $this->_scopeConfig->getValue(self::BANNER_IMAGE_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }
}
