App.Collections.Widgets = Backbone.Collection.extend({
	model: App.Models.Widget,

	// initialize: function(models, options) {
	// 	this.id = options;
	// },

	url: function () {
		return '/admin/widgets/';
	}
});