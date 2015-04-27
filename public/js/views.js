// Global App View
App.Views.App = Backbone.View.extend({
	initialize: function() {
		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
		$('#boiler').append(allWidgetsView.el);
		App.pubSub.trigger('postRender');
	}
});


App.Views.WidgetBuilder = Backbone.View.extend({

	initialize: function() {
		var allWidgetsView = new App.Views.Widgets({ collection: App.widgets}).render();
		var addWidgetView = new App.Views.AddWidget({collection: App.trueWidgets});

		var editWidetView = new App.Views.EditWidgetCollection({collection: App.trueWidgets}).render();

		$('#boiler').append(allWidgetsView.el);
		App.pubSub.trigger('postRender');
		$('#editWidgetForm-shell').prepend(editWidetView.el);
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

	initialize: function(){
		this.heading = $('#heading');
		this.dashboard_id = $('#dashboard_id');
	},

	events: {
		'submit': 'addWidget'
	},

	addWidget: function(e){
		e.preventDefault();
		this.collection.create({
			heading: this.heading.val(),
			dashboard_id: this.dashboard_id.val(),
			size: 'large-3',
			class: '',
			type: 'blank'
		}, {
			
			success: function(model, resp){
				notification(resp, 'success');
				App.pubSub.trigger('new-widget', this.model);
			},
			error: function(model, resp){
				notification(resp.statusText, 'error');
			},
			wait:true
		});

		this.clearForm();
		
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
		console.log('hello from refresh');
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

/*
|--------------------------------------------------------------------------
| Single Widget View
|--------------------------------------------------------------------------
*/
App.Views.Widget = Backbone.View.extend({

	tagName: 'div',

	template: this.type, 

	initialize: function(){
		var source = $('#' + this.model.get('type') ).html();
		this.template = Handlebars.compile(source);
		App.pubSub.on('postRender', this.postRender, this);
		this.model.on('destroy', this.unrender, this);
	},

	events: {
		'click .widget' : 'editWidget',
		'click a.widget-delete' : 'deleteWidget',
	},

	deleteWidget: function() {
		console.log(this.url);
		this.model.destroy();
	},

	editWidget: function() {
		this.$el.addClass('widget-active');
		$('#builder-sidebar-trigger').trigger('gumby.trigger'); // need to do a check if the trigger is open before firing this.
		$('#widgetBuilder-tabs').trigger('gumby.set', 1);
		App.pubSub.trigger('new-edit', this.model);
		// var editWidgetView = new App.Views.EditWidget({model: this.model});

	},

	render: function() {
		
		this.$el.html( this.template( this.model.toJSON() ) ); 
		return this;
	},

	unrender: function(){
		this.remove(); 
	},

	postRender: function() {
		switch(this.model.get('type')) {
			case 'Backgrid':
				this.buildBackgrid();
				break;
			case 'PerformanceFeed':
				this.buildFeed();
				break;
			default:
				return;
		}
	},

	buildFeed: function() {
		Highcharts.setOptions({
                lang: {
                    thousandsSep: ',',
                    decimalPoint: '.'
                }
            });
		var content = this.model.get('content');
		console.log(content.chartConfig);
		//get the widget wrapper
		$('#feed_' + this.model.get('id')).highcharts(content.chartConfig);
	},

	buildBackgrid: function(){
		
		if(this.model.get('type') != 'Backgrid'){
			return
		} else {
			var gridID = 'backgrid_' + this.model.get('id');
			var content = this.model.get('content');

			App.Collections.DashOrders = Backbone.PageableCollection.extend({
				model: App.Models.PurchaseOrder,
				url: "/json/purchaseOrders/",
				state: {
				    pageSize: 9,
				    // sortKey: "updated",
				    // order: 1
				  },
				  mode: "client"
			});

			//this is being hardcoded to use Collection.Orders -- in the future 
			//we need this to create a collection based on the model's 'resource' attribute.
			App.gridID = new App.Collections.DashOrders;
			var $columns = [];
			for(var i = 0; i < content.columns.length; i++)
			{
				$columns.push({
					cell: content.columns[i].type,
					editable: false,
					label: content.columns[i].label,
					name: content.columns[i].name
				});
			}	
			
			var grid = new Backgrid.Grid({
				columns: $columns,
				collection: App.gridID
			});

			var widget_wrap = $('#backgrid_7');
			
			widget_wrap.append(grid.render().el);
			var paginator = new Backgrid.Extension.Paginator({
				collection: App.gridID
			});

			widget_wrap.after(paginator.render().el);

			App.gridID.fetch({reset:true});
		}
	}

});

/*
|--------------------------------------------------------------------------
| Eidt Widget View
|--------------------------------------------------------------------------
*/
App.Views.EditWidget = Backbone.View.extend({
	model: App.Models.Widget,
	tagName: 'div',

	template: template('editWidgetTemplate'), 

	initialize: function(){
		App.pubSub.on('new-edit', this.unrender, this);
	},

	render: function() {
		this.model.fetch({
			success: function(model){
				console.log(model.toJSON());
			}, error: function(){
				console.log('nope');
			}
		});
		
		this.$el.html( this.template( this.model.toJSON() ) );

		return this;
	},

	events: {
		'submit #editWidget': 'saveWidget'
	},

	saveWidget: function(e){
		e.preventDefault();
		this.model.save(this.model, {
			
			success: function(model, resp){
				notification(resp, 'success');
				App.pubSub.trigger('new-widget', this.model);
			},
			error: function(model, resp){
				notification(resp.statusText, 'error');
			},
			wait:true
		});
		// notification(this.heading.val() + ' widget created successfully.', 'success');
	},

	unrender: function(){
		this.remove(); 
	}

});


/*
|--------------------------------------------------------------------------
| Eidt Widget Collection View
|--------------------------------------------------------------------------
*/

App.Views.EditWidgetCollection = Backbone.View.extend({
	tagName: 'div',
	className: 'row',

	initialize: function(){
		App.pubSub.on('new-edit', this.addWidget, this);
		// this.collection.on('add', this.addOne, this);
	},

	addWidget: function(widget) {
		console.log('hellow from addWidget');
		var editWidgetView = new App.Views.EditWidget({model: widget});
		this.$el.append(editWidgetView.render().el);
		$('.form-control.type-select').select2(); // this is only for counters currently. Need a better way to call this
		$('.form-control.widget-select').select2(); // this is only for counters currently. Need a better way to call this -- Maybe based on the class???
	},

	render: function() {
		
		return this;
	},
});

/*
|--------------------------------------------------------------------------
| All Widget Meta Collection View
|--------------------------------------------------------------------------
*/