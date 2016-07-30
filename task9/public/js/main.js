require.config({
    baseUrl: '/js/libs',
    path: {
        jquery: '/js/libs/jquery',
        underscore: '/js/libs/underscore',
        validation: '/js/libs/validation',
        backbone: '/js/libs/backbone',
        marionette: '/js/libs/marionette'

    },

    shim: {
        'underscore': {
            exports: '_'
        },
        backbone: {
            deps: ['jquery', 'underscore'],
            exports: "Backbone"
        },
        marionette: {
            deps: ['backbone'],
            exports: 'Marionette'
        },
        'validation': {
            deps: [
                'jquery',
                'underscore',
                'backbone'
            ],
            exports: 'BackboneValidation'
        }
    }
});

define(['backbone', '../routes'], function (Backbone) {
    Backbone.history.start();
});