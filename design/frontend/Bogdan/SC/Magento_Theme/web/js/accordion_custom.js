define([
    'jquery',
    'matchMedia',
    'accordion'
], function ($, mediaCheck) {
    'use strict';

    $.widget('mage.accordion_custom', {
        options: {
            openedClass: 'accordion_links_header accordion_opened', // Class used to be toggled on clicked element
            closedClass: 'accordion_links_header accordion_closed' // Class used to be toggled on clicked element
        },

        _init: function () {
            this.checkMedia();
            this._addHandlers();
        },

        /**
         * Check adaptive
         * @private
         */
        checkMedia: function () {
            mediaCheck({
                media: '(min-width: ' + this.options.breakpoint + 'px)',
                entry: $.proxy(function () {
                    this._widgetHandle();
                    this._destroy();
                }, this),
                exit: $.proxy(function () {
                    this._widgetHandle();
                }, this)
            });
        },

        /**
         * Disable widget
         * @private
         */
        _destroy: function () {
            $(this.element).accordion('activate');
            $(this.element).accordion('destroy');
        },

        /**
         * Enable widget
         * @private
         */

        _widgetHandle: function () {
            $(this.element).accordion({
                active: true,
                collapsible: true,
                openedState: 'active',
                closedState: 'closed',
                multipleCollapsible: true,
            });
        },

        /**
         * Change class on widget header
         * @private
         */

        _addHandlers() {
            var headerClass = $('.' + this.options.headerClass);
            var options = this.options;

            headerClass.on('click', function (event) {
                if (event.target.className === options.closedClass) {
                    event.target.className = options.openedClass
                } else if (event.target.className === options.openedClass) {
                    event.target.className = options.closedClass
                }
            })
        },

    });

    return $.mage.accordion_custom;
});

