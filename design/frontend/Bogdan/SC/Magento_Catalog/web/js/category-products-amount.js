/**
 * @package     BlueAcorn/CategoryProductsAmount
 * @version     1.0.0
 * @author      Blue Acorn, LLC. <code@blueacorn.com>
 * @author      Greg Harvell <greg@blueacorn.com>
 * @copyright   Copyright © 2018, Blue Acorn, LLC.
 * WARNING: COMPILED FROM SOURCE, DO NOT EDIT COMPILED FILE, LOOK IN js/source DIRECTORY
 */

define(['jquery', 'baCore', 'jquery/ui', 'domReady!'], function ($, ba) {
    'use strict';

    $.widget('ba.categoryProductsAmount', {

        /**
         * Object of DOM Element Selectors used in this widget.
         */
        dom: {
            destination: '#category-products-amount',
            loaded: '#category-products-amount #toolbar-amount'
        },

        /**
         * Returns DOM Element listed in dom object by key.
         * @param el
         * @returns {*|n.fn.init|jQuery.fn.init|jQuery|HTMLElement}
         * @private
         */
        _el: function _el(el) {
            return $(this.dom[el]);
        },


        /**
         *  CategoryProductsAmount Magento jQuery Widget Constructor
         */
        _create: function _create() {
            var self = this;

            var $element = $(self.element);

            if (self._el('loaded').length === 0) {
                $element.removeClass('visually-hidden').appendTo(self._el('destination'));
            } else {
                $element.remove();
            }
        }
    });

    return $.ba.categoryProductsAmount;
});
