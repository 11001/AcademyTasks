define(['Backbone', 'validation'], function() {
    user = Backbone.Model.extend({
        urlRoot: '/user',
        validation: {
            firstname: {
                required: true,
                pattern: /^[A-z]+$/,
            },
            lastname: {
                required: true,
                pattern: /^[A-z]+$/
            },
            email: {
                required: true,
                pattern: /^[A-z]+$/
            }
        }
    });
    return user;
});