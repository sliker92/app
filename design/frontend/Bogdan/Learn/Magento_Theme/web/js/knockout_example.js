define(['ko'], function (ko) {
    'use strict';

    return function () {

        var time = ko.observable('...loading');
        var currTime = new Date().getHours() + ":" + new Date().getMinutes() + ":" + new Date().getSeconds();

        var viewModel = {
            info: time
        };

        setTimeout(function () {
            return time('Current time: ' + currTime)
        }, 2000);

        return viewModel
    }
});