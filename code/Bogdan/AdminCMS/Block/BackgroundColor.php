<?php

namespace Bogdan\AdminCMS\Block;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Bogdan\AdminCMS\Helper\Data;

class BackgroundColor extends Field {

    /**
     * @var Data \Bogdan\AdminCMS\Helper\Data
     */
    public $_helper;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->_helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Add colorpicker and get it's value
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element) {
        $html = $element->getElementHtml();
        $value = $element->getData('value');

        $html .= '<script type="text/javascript">
        require([
                "jquery",
                "jquery/colorpicker/js/colorpicker"
                ], function ($) {

                var $el = $("#' . $element->getHtmlId() . '");
                $el.css("background-color", "'. $value .'");

                // Attach the color picker
                $el.ColorPicker({
                    color: "'. $value .'",
                    onChange: function (hsb, hex, rgb) {
                        $el.css("background-color", "rgba(" + rgb.r + ", " + rgb.g + ", " + rgb.b + ", .8)").val("rgba(" + rgb.r + ", " + rgb.g + ", " + rgb.b + ", .8)");
                    }
                });
        });
        </script>';
        return $html;
    }

    /**
     * @return mixed
     */
    public function getBannerBackgroundColor()
    {
        return $this->_helper->getBannerBackground();
    }

}

