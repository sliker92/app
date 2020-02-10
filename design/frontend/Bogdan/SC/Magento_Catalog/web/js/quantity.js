require([], function () {
    'use strict';
    // return function () {
    //     _init: function () {
    //         var value = $("#qty").val();
    //
    //         $('#incr').on('click', function () {
    //             value++
    //         });
    //
    //         $('#decr').on('click', function () {
    //             value--
    //         });
    //     }
    // }
    document.getElementById('incr').addEventListener('click', function () {
        document.getElementById('qty').value++
    });

    document.getElementById('decr').addEventListener('click', function () {
        document.getElementById('qty').value--
    })
});
