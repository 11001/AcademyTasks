define(['Marionette', 'jquery', '../app', '../collections/users', '../views/UserViews/index', '../views/UserViews/edit', '../views/UserViews/create'], function (Marionette, $) {
    UserController = Marionette.Controller.extend({
        index: function () {
            listUser = new ListUserView({
                collection: users
            });
            app.getRegion('container').show(listUser);
        },
        create: function () {
            app.getRegion('container').show(new CreateUserView());
        },

        edit: function() {
            app.getRegion('container').show(new EditUserView());
        }
    });

    userController = new UserController();
    return userController;
});
