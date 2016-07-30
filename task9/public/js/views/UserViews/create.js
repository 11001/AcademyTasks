define(['backbone', 'marionette', 'validation', '../../models/user'], function(Backbone, Marionette, BackboneValidation) {
    CreateUserView =  Marionette.ItemView.extend({
        template: '#createUser',
        model: new user(),
        ui: {
            firstname: '[name="firstname"]',
            lastname: '[name="lastname"]',
            email: '[name="email"]',
        },
        initialize: function() {
            this.bindUIElements();
            BackboneValidation.bind(this);
        },
        events: {
            'click .btn': function () {
                this.model.save({
                    firstname: this.ui.firstname.val(),
                    lastname: this.ui.lastname.val(),
                    email: this.ui.email.val()
                });
            }
        }
    });

    return CreateUserView;
});