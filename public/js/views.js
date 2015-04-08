// Global App View
App.Views.App = Backbone.View.extend({
	initialize: function() {
		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
		$('#boiler').append(allWidgetsView.el);
	}
});


/* All Widgets View*/
App.Views.Widgets = Backbone.View.extend({
	initialize: function(){	
		
	},

	tagName: 'div',
	className: 'deck-row',

	render: function() {
		// this.$el.append('<div class="widget">');
		this.collection.each( this.addOne, this );
		// this.$el.append('</div>');
		return this;
	},

	addOne: function(widget) {
		
		var widgetView = new App.Views.Widget({ model: widget });
		this.$el.append(widgetView.render().el);
	}
});

/* Single Widget View */
App.Views.Widget = Backbone.View.extend({

	tagName: 'div',
	className: 'large-2',

	template: template('counterTemplate'), 

	render: function() {
		console.log(this);
		this.$el.html( this.template( this.model.toJSON() ) );
		return this;
	}

});