define(['Backbone', '../models/user'], function(Backbone) {
    var Users = Backbone.Collection.extend({
        url: '/user',
        model: user
    });

    users = new Users();
    users.fetch();
    return users;
});
