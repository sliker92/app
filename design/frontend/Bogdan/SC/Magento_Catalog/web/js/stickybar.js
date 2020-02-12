define(['jquery'], function ($) {
    'use strict';
    $.widget('mage.stickybar', {
        options: {
            bar: $('.content_links_bar_wrapper')
        },

        _init: function () {
            this._addHandlers();
        },

        _addHandlers() {
            var options = this.options;
            var sticky = options.bar[0].offsetTop;

            $(window).on('scroll', function () {
                    if (this.pageYOffset >= sticky) {
                        options.bar[0].classList.add("sticky")
                    } else {
                        options.bar[0].classList.remove("sticky");
                    }
            });
        },
    });

    return $.mage.stickybar;
});
