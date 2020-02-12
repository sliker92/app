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
            var value = options.qty.val();
            var self = this;

            options.incr.on('click', function () {
                if(self.checkLimit()) {
                    options.qty.val(value++);
                }
            });
            options.decr.on('click', function () {
                if(self.checkLimit()) {
                    options.qty.val(value--);
                }
            });
        },

        checkLimit() {
            return this.options.qty.val() > 1;
        },

    });

    return $.mage.counter;
});
// document.getElementById('incr').addEventListener('click', function () {
//     document.getElementById('qty').value++
// });
//
// document.getElementById('decr').addEventListener('click', function () {
//     document.getElementById('qty').value--
// })
// });
