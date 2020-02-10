<?php

namespace Bogdan\AdminCMS\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class About extends Template {

    /** System config xml paths */
    const ABOUT_IMAGE_PATH = 'about_section/about_section_data/banner_background_image';

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


    public function getAboutImage()
    {
        return $this->getFullPath($this->aboutImage());

    }

    public function aboutImage() {
        return $this->_scopeConfig->getValue(self::ABOUT_IMAGE_PATH, ScopeInterface::SCOPE_STORE, $this->getCurrentStoreId());
    }
}
