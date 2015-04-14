// Global App View
App.Views.App = Backbone.View.extend({
	initialize: function() {
		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
		$('#boiler').append(allWidgetsView.el);
	}
});


App.Views.WidgetBuilder = Backbone.View.extend({

	initialize: function() {
		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
		var addWidgetView = new App.Views.AddWidget({collection: App.trueWidgets});
		$('#boiler').append(allWidgetsView.el);
	}

})


/*
|--------------------------------------------------------------------------
| Events
|--------------------------------------------------------------------------
*/

App.pubSub = _.extend({}, Backbone.Events);


/*
|--------------------------------------------------------------------------
| Add Widgets View
|--------------------------------------------------------------------------
*/

App.Views.AddWidget = Backbone.View.extend({
	model: App.Models.Widget,
	el: '#addWidget',

	//Not sure about this -- where is it getting the title?
	initialize: function(){
		console.log();
		this.heading = $('#heading');
		this.dashboard_id = $('#dashboard_id');
	},

	events: {
		'submit': 'addWidget'
	},

	addWidget: function(e){
		e.preventDefault();
		console.log('yes');
		this.collection.create({
			heading: this.heading.val(),
			dashboard_id: this.dashboard_id.val(),
			size: 'large-3',
			class: '',
			type: 'blank'
		}, {wait:true});

		this.clearForm();
		
		App.pubSub.trigger('new-widget', 'some text');

		notification(this.heading.val() + ' widget created successfully.', 'success');
	},

	clearForm:function() {
		this.heading.val('');
	}
});


/*
|--------------------------------------------------------------------------
| All Widgets View
|--------------------------------------------------------------------------
*/
App.Views.Widgets = Backbone.View.extend({
	model: App.Models.Widget,

	tagName: 'div',
	className: 'deck-row',

	initialize: function(){
		App.pubSub.on('new-widget', this.refresh, this);
		this.collection.on('add', this.addOne, this);
	},

	refresh: function() {
		this.collection.fetch();
	},

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

	template: template('counterTemplate'), 

	render: function() {
		this.$el.html( this.template( this.model.toJSON() ) );
		return this;
	}

});