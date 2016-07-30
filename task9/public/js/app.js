define(['marionette', 'backbone', 'jquery', 'validation'], function (Marionette, Backbone, $) {
     app = new Marionette.Application();

    app.addRegions({
        container: "#app-container",
    });
    Backbone.Validation.configure({
        forceUpdate: true
    });

    _.extend(Backbone.Validation.callbacks, {
        valid: function (view, attr, selector) {
            var $el = view.$('[name=' + attr + ']'),
                $group = $el.closest('.form-group');

            $group.removeClass('has-error');
            $group.find('.help-block').html('').addClass('hidden');
        },
        invalid: function (view, attr, error, selector) {
            var $el = view.$('[name=' + attr + ']'),
                $group = $el.closest('.form-group');

            $group.addClass('has-error');
            $group.find('.help-block').html(error).removeClass('hidden');
        }
    });
    app.start();
    return app;
});