define(['marionette', '../controllers/BookController'], function(Marionette) {
    bookRouter = new Marionette.AppRouter({
        controller: bookController,
        appRoutes: {
            'book': 'index',
            'book/create': 'create',
            'book/edit/:id': 'create',
        }
    });
    return bookRouter;
});
