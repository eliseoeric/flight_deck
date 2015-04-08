App.Collections.Widgets = Backbone.Collection.extend({
	model: App.Models.Widget,

	// initialize: function(models, options) {
	// 	this.id = options;
	// },

	url: function () {
		return '/admin/dashboards/1/';
	}
});

App.Collections.Reps = Backbone.Collection.extend({
  model: App.Models.Rep,
  url: "/json/representatives/"
});