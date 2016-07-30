define(['marionette', '../controllers/UserController'], function (Marionette) {
    userRouter = new Marionette.AppRouter({
        controller: userController,
        appRoutes: {
            'user': 'index',
            'user/create': 'create',
            'user/edit/:id': 'edit'
        }
    });
});

