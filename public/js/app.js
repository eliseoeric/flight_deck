(function() {
	window.App = {
		Models: {},
		Collections: {},
		Views: {},
		Router: {}
	};

	window.vent = _.extend({}, Backbone.Events);

	window.template = function(id) {
		return _.template( $('#' + id).html() );
	}

	window.notification = function(message, level) {
		var notification = new NotificationFx({
            message : '<div class="ns-thumb ' + level +'"><i class="fa fa-server"></i></div><div class="ns-content "><p>' + message +'</p></div>',
            layout : 'other',
            ttl : 6000,
            effect : 'thumbslider',
            type : 'notice', // notice, warning, error or success
            onClose : function() {
            bttn.disabled = false;
            }
            });
            notification.show();
	}
Handlebars.registerHelper('img', function(text, url) {
  text = Handlebars.Utils.escapeExpression(text);
  url  = Handlebars.Utils.escapeExpression(url);

  var result = '< img src="' + url + '">';

  return result;
});

Handlebars.registerHelper('calcPerc', function(sales, total) {
  return Math.round( (sales/total)*100 );
});

})();