define(['marionette', 'backbone', 'validation', '../../models/book'], function(Marionette, Backbone, BackboneValidation) {
    CreateBookView =  Marionette.ItemView.extend({
        template: '#createBook',
        model: new book(),
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
            'click .btn': function () {
                this.model.save({
                    title: this.ui.title.val(),
                    author: this.ui.author.val(),
                    year: this.ui.year.val(),
                    genre: this.ui.genre.val(),
                });
            }
        }
    });

    return CreateBookView;
});
