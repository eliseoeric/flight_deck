// Global App View
App.Views.App = Backbone.View.extend({
	initialize: function() {
		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
		$('#boiler').append(allWidgetsView.el);
	}
});


/* All Widgets View*/
App.Views.Widgets = Backbone.View.extend({
	tagName: 'div',
	className: 'deck-row',

	render: function() {
		this.collection.each( this.addOne, this );
		this.collection.each( this.determineType, this );
		return this;
	},

	determineType: function(widget) {
		console.log(this);
	},

	addOne: function(widget) {
		var widgetView = new App.Views.Widget({ model: widget });
		this.$el.append(widgetView.render().el);
	}
});

/* Single Widget View */
App.Views.Widget = Backbone.View.extend({

	tagName: 'div',
	className: 'large-3 widget',

	template: template('smallBoxTemplate'), 

	render: function() {
		this.$el.html( this.template( this.model.toJSON() ) );
		return this;
	}

});