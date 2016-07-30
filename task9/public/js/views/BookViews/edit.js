define(['backbone', 'marionette', 'validation', '../../models/user'], function(Backbone, Marionette, BackboneValidation) {
    EditBookView =  Marionette.ItemView.extend({
        template: '#editBook',
        ui: {
            title: '[name="title"]',
            author: '[name="author"]',
            year: '[name="year"]',
            genre: '[name="genre"]'
        },
        initialize: function() {
            this.bindUIElements();
            BackboneValidation.bind(this);
        },
        events: {
            'click .btn': function() {
                alert('update book');
                console.log(this.ui);
                this.model.set(
                    {
                        title: this.ui.title.val(),
                        author: this.ui.author.val(),
                        year: this.ui.year.val(),
                        genre: this.ui.genre.val(),
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


    return EditBookView;
});