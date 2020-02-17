define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Bogdan_Checkout/newsletter'
            },
            isRegisterNewsletter: true
        });
    }
);
