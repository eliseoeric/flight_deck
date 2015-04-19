// // Global App View
// App.Views.App = Backbone.View.extend({
// 	initialize: function() {
// 		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
// 		$('#boiler').append(allWidgetsView.el);
// 	}
// });


// App.Views.WidgetBuilder = Backbone.View.extend({

// 	initialize: function() {
// 		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
// 		var addWidgetView = new App.Views.AddWidget({collection: App.trueWidgets});

// 		var editWidetView = new App.Views.EditWidgetCollection({collection: App.trueWidgets}).render();

// 		$('#boiler').append(allWidgetsView.el);
// 		$('#editWidgetForm-shell').prepend(editWidetView.el);
// 	}

// })


// /*
// |--------------------------------------------------------------------------
// | Events
// |--------------------------------------------------------------------------
// */

// App.pubSub = _.extend({}, Backbone.Events);


// /*
// |--------------------------------------------------------------------------
// | Add Widgets View
// |--------------------------------------------------------------------------
// */

// App.Views.AddWidget = Backbone.View.extend({
// 	model: App.Models.Widget,
// 	el: '#addWidget',

// 	//Not sure about this -- where is it getting the title?
// 	initialize: function(){
// 		this.heading = $('#heading');
// 		this.dashboard_id = $('#dashboard_id');
// 	},

// 	events: {
// 		'submit': 'addWidget'
// 	},

// 	addWidget: function(e){
// 		e.preventDefault();
// 		this.collection.create({
// 			heading: this.heading.val(),
// 			dashboard_id: this.dashboard_id.val(),
// 			size: 'large-3',
// 			class: '',
// 			type: 'blank'
// 		}, {
			
// 			success: function(model, resp){
// 				notification(resp, 'success');
// 				App.pubSub.trigger('new-widget', this.model);
// 			},
// 			error: function(model, resp){
// 				notification(resp.statusText, 'error');
// 			},
// 			wait:true
// 		});

// 		this.clearForm();
		
// 	},

// 	clearForm:function() {
// 		this.heading.val('');
// 	}
// });


// /*
// |--------------------------------------------------------------------------
// | All Widgets View
// |--------------------------------------------------------------------------
// */
// App.Views.Widgets = Backbone.View.extend({
// 	model: App.Models.Widget,

// 	tagName: 'div',
// 	className: 'deck-row',

// 	initialize: function(){
// 		App.pubSub.on('new-widget', this.refresh, this);
// 		this.collection.on('add', this.addOne, this);
// 	},

// 	refresh: function() {
// 		console.log('hellow from refresh');
// 		this.collection.fetch();
// 	},

// 	render: function() {
// 		// this.$el.append('<div class="widget">');
// 		this.collection.each( this.addOne, this );
// 		// this.$el.append('</div>');
// 		return this;
// 	},

// 	addOne: function(widget) {
// 		var widgetView = new App.Views.Widget({ model: widget });
// 		this.$el.append(widgetView.render().el);
// 	}
// });

// /*
// |--------------------------------------------------------------------------
// | Single Widget View
// |--------------------------------------------------------------------------
// */
// App.Views.Widget = Backbone.View.extend({

// 	tagName: 'div',

// 	template: template('counterTemplate'), 

// 	initialize: function(){
// 		this.model.on('destroy', this.unrender, this);
// 	},

// 	events: {
// 		'click .widget' : 'editWidget',
// 		'click a.widget-delete' : 'deleteWidget',
// 	},

// 	deleteWidget: function() {
// 		console.log(this.url);
// 		this.model.destroy();
// 	},

// 	editWidget: function() {
// 		this.$el.addClass('widget-active');
// 		$('#builder-sidebar-trigger').trigger('gumby.trigger'); // need to do a check if the trigger is open before firing this.
// 		$('#widgetBuilder-tabs').trigger('gumby.set', 1);
// 		App.pubSub.trigger('new-edit', this.model);
// 		// var editWidgetView = new App.Views.EditWidget({model: this.model});

// 	},

// 	render: function() {
// 		this.$el.html( this.template( this.model.toJSON() ) );
// 		return this;
// 	},

// 	unrender: function(){
// 		this.remove(); 
// 	}

// });

// /*
// |--------------------------------------------------------------------------
// | Eidt Widget View
// |--------------------------------------------------------------------------
// */
// App.Views.EditWidget = Backbone.View.extend({
// 	model: App.Models.Widget,
// 	tagName: 'div',

// 	template: template('editWidgetTemplate'), 

// 	initialize: function(){
// 		App.pubSub.on('new-edit', this.unrender, this);
// 	},

// 	render: function() {
// 		this.model.fetch({
// 			success: function(model){
// 				console.log(model.toJSON());
// 			}, error: function(){
// 				console.log('nope');
// 			}
// 		});
		
// 		this.$el.html( this.template( this.model.toJSON() ) );

// 		return this;
// 	},

// 	events: {
// 		'submit #editWidget': 'saveWidget'
// 	},

// 	saveWidget: function(e){
// 		e.preventDefault();
// 		this.model.save(this.model, {
			
// 			success: function(model, resp){
// 				notification(resp, 'success');
// 				App.pubSub.trigger('new-widget', this.model);
// 			},
// 			error: function(model, resp){
// 				notification(resp.statusText, 'error');
// 			},
// 			wait:true
// 		});
// 		// notification(this.heading.val() + ' widget created successfully.', 'success');
// 	},

// 	unrender: function(){
// 		this.remove(); 
// 	}

// });


// /*
// |--------------------------------------------------------------------------
// | Eidt Widget Collection View
// |--------------------------------------------------------------------------
// */

// App.Views.EditWidgetCollection = Backbone.View.extend({
// 	tagName: 'div',
// 	className: 'row',

// 	initialize: function(){
// 		App.pubSub.on('new-edit', this.addWidget, this);
// 		// this.collection.on('add', this.addOne, this);
// 	},

// 	addWidget: function(widget) {
// 		console.log('hellow from addWidget');
// 		var editWidgetView = new App.Views.EditWidget({model: widget});
// 		this.$el.append(editWidgetView.render().el);
// 		$('.form-control.type-select').select2(); // this is only for counters currently. Need a better way to call this
// 		$('.form-control.widget-select').select2(); // this is only for counters currently. Need a better way to call this -- Maybe based on the class???
// 	},

// 	render: function() {
		
// 		return this;
// 	},
// });

// /*
// |--------------------------------------------------------------------------
// | All Widget Meta Collection View
// |--------------------------------------------------------------------------
// */