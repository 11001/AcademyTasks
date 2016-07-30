define(['Backbone', '../models/book'], function(Backbone) {
    var Books = Backbone.Collection.extend({
        url: '/book',
        model: book
    });

    books = new Books();
    books.fetch();
    return books;
});

