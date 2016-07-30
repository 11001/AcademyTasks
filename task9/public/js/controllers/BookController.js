define(['backbone', 'marionette', '../collections/books', '../app', '../views/BookViews/index', '../views/BookViews/edit', '../views/BookViews/create'], function (Backbone, Marionette) {
    BookController = Marionette.Controller.extend({
        index: function () {
            app.getRegion('container').show(new ListBookView({collection: books}));
        },
        create: function () {
            app.getRegion('container').show(new CreateBookView());
        },
        edit: function() {
            app.getRegion('container').show(new CreateBookView());
        }
    });

    bookController = new BookController();

    return bookController;
});
