App.Collections.Widgets = Backbone.Collection.extend({
	model: App.Models.Widget,

	// initialize: function(models, options) {
	// 	this.id = options;
	// },

	url: function () {
		return '/admin/widgets/';
	}
});

App.Collections.TrueWidgets = Backbone.Collection.extend({
	model: App.Models.Widget,
	url: "/admin/widgets"
});

App.Collections.Reps = Backbone.Collection.extend({
  model: App.Models.Rep,
  url: "/json/representatives/"
});

App.Collections.Users = Backbone.Collection.extend({
	model: App.Models.User,
	url: "/json/users/"
});

App.Collections.Regions = Backbone.Collection.extend({
	model: App.Models.Region,
	url: "/json/regions"
});

App.Collections.Customers = Backbone.Collection.extend({
	model: App.Models.Customer,
	url: "/json/customers"
});

App.Collections.Orders = Backbone.PageableCollection.extend({
	model: App.Models.PurchaseOrder,
	url: "/json/purchaseOrders/",
	state: {
	    pageSize: 15,
	    // sortKey: "updated",
	    // order: 1
	  },
	  mode: "client"
});

// App.Collection.Orders = Backbone.PageableCollection.extend({
// 	model: App.Models.PurchaseOrder,
// 	url: "/json/purchaseOrders/",
// 	state: {
// 		pageSize: 15
// 	}
// });