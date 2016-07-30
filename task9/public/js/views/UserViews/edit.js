define(['backbone', 'marionette', 'validation', '../../models/user'], function (Backbone, Marionette, BackboneValidation) {
    EditUserView = Marionette.ItemView.extend({
        template: '#editUser',
        ui: {
            firstname: '[name="firstname"]',
            lastname: '[name="lastname"]',
            email: '[name="email"]',
        },
        initialize: function () {
            this.bindUIElements();
            BackboneValidation.bind(this);
        },
        events: {
            'click .btn': function () {
                this.model.set(
                    {
                        firstname: this.ui.firstname.val(),
                        lastname: this.ui.lastname.val(),
                        email: this.ui.email.val()
                    });

                if (this.model.isValid()) {
                    this.model.save({
                        success: function () {
                            alert('user update');
                        },
                        error: function () {
                            alert('user not update')
                        }
                    });
                }
            }
        }
    });
    return EditUserView;
});