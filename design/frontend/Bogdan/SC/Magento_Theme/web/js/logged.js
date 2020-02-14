define([
    'uiComponent',
    'Magento_Customer/js/model/customer'
], function (
    Component,
    customer
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Magento_Theme/logged'
        },

        /**
         * Check if customer is logged in
         *
         * @return {boolean}
         */
        isLoggedIn: function () {
            return customer.isLoggedIn();
        }
    });
});
