define(['jquery'], function ($) {
    'use strict';
    $.widget('mage.counter', {
        options: {
            qty: $('#qty'),
            incr: $('#incr'),
            decr: $('#decr')
        },

        _init: function () {
            this._addHandlers();
        },

        _addHandlers() {
            var options = this.options;
            var self = this;

            options.incr.on('click', function () {
                if(self.checkLimit()) {
                    document.getElementById('qty').value++
                }
            });
            options.decr.on('click', function () {
                if(self.checkLimit()) {
                    document.getElementById('qty').value--
                }
            });
        },

        checkLimit() {
            return this.options.qty.val() >= 1;
        },

    });

    return $.mage.counter;
});
