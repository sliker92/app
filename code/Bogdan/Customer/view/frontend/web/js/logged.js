define([
    'uiComponent',
    'Magento_Customer/js/model/customer',
    'ko'
], function (Component, customer, ko) {
    'use strict';

    return Component.extend({
        isLoggedIn: function () {
            return JSON.parse(localStorage.getItem('mage-cache-storage')).customer
        }
    });
});
