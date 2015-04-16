App.Collections.Widgets = Backbone.Collection.extend({
	model: App.Models.Widget,

	// initialize: function(models, options) {
	// 	this.id = options;
	// },

	url: function () {
		return '/admin/dashboards/1/';
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