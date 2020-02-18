define(
    [
        'ko',
        'uiComponent',
        'underscore',
        'Magento_Checkout/js/model/step-navigator',
        'jquery',
        'mage/translate',
        'mage/calendar'
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator,
        $,
        $t
    ) {
        'use strict';

        return Component.extend({
            options: {
                calendarEl: '#input-date'
            },
            defaults: {
                template: 'Bogdan_Checkout/checkout_step'
            },

            //add here your logic to display step,
            isVisible: ko.observable(false),

            /**
             *
             * @returns {*}
             */
            initialize: function () {
                this._super();
                // register your step
                stepNavigator.registerStep(
                    //step code will be used as step content id in the component template
                    'step_code',
                    //step alias
                    null,
                    //step title value
                    'Delivery date',
                    //observable property with logic when display step or hide step
                    this.isVisible,

                    _.bind(this.navigate, this),

                    /**
                     * sort order value
                     * 'sort order value' < 10: step displays before shipping step;
                     * 10 < 'sort order value' < 20 : step displays between shipping and payment step
                     * 'sort order value' > 20 : step displays after payment step
                     */
                    15
                );



                return this;
            },

            /**
             * The navigate() method is responsible for navigation between checkout step
             * during checkout. You can add custom logic, for example some conditions
             * for switching to your custom step
             * When the user navigates to the custom step via url anchor or back button we_must show step manually here
             */
            navigate: function () {
                this.addCalendar();
                this.isVisible(true);
            },

            /**
             * @returns calendar element
             */

            addCalendar: function() {
                var self = this;

                $(this.options.calendarEl).calendar({
                    changeMonth: true,
                    changeYear: false,
                    showButtonPanel: true,
                    currentText: $t('Go Today'),
                    closeText: $t('Close'),
                    showWeek: true
                });
            },

            /**
             * @returns void
             */
            navigateToNextStep: function (el) {
                stepNavigator.next(el);
            }
        });
    }
);
