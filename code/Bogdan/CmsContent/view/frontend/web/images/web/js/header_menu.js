define([
    'jquery',
    'jquery-ui-modules/dialog',
    'mage/translate',
    'dropdownDialog',
    'matchMedia',
    'accordion_custom',
], function ($, _) {
    'use strict';

    $.widget('mage.header_menu', {

        options: {
            headerClass: 'menu_navigation_link',
            openedClass: 'menu_navigation_link link_opened', // Class used to be toggled on clicked element
            closedClass: 'menu_navigation_link link_closed' // Class used to be toggled on clicked element
        },

        _init: function () {
            $('.header_menu_wrapper').css('display', 'block');
            this._widgetOptions();
            this._addHandler();
        },

        _widgetOptions: function () {
            $(this.element).dropdownDialog({
                "appendTo": "[data-block=dropdown]",
                "triggerTarget":"[data-trigger=trigger]",
                "timeout": 2000,
                "closeOnMouseLeave": false,
                "closeOnEscape": true,
                "autoOpen": false,
                "triggerClass": "active",
                "parentClass": "active",
                "buttons": []
            });
                $(this.element).accordion_custom();
        },

        _addHandler() {
            var headerClass = $('.' + this.options.headerClass);
            var options = this.options;

            headerClass.on('click', function (element) {
                if (element.target.className === options.closedClass) {
                    element.target.className = options.openedClass
                } else if (element.target.className === options.openedClass) {
                    element.target.className = options.closedClass
                }
            })
        },
    });

    return $.mage.header_menu;
});
