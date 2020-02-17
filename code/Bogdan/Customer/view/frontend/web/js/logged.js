define([
    'uiComponent',
    'ko',
], function (Component, ko) {
    'use strict';

    return Component.extend({
        isLoggedIn: function () {
            return this.getCustomer();
        },

        getCustomer() {
            return JSON.parse(localStorage.getItem('mage-cache-storage')).customer;
        }
    });
});
