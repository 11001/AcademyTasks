define(['marionette', '../../models/book', '../../collections/books', './edit', './create'], function(Marionette) {

    ItemBookView = Marionette.ItemView.extend({
        model: book,
        tagName: 'li',
        template: '#itemBookView',
        events: {
            'click .delete': function () {
                console.log(this.model.id);
                this.model.destroy({
                    "_token": $('meta[name="csrf-token"]').attr('content')
                });
            },
            'click .edit': function() {
                console.log(this.model);
                app.getRegion('container').show(new EditBookView({model: this.model}));
            }
        }
    });

    ListBookView = Marionette.CollectionView.extend({
        tag: 'ol',
        childView: ItemBookView,
    });

    return ListBookView;
});
