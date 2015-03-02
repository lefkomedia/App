$(document).ready(function() {

	var app = {
		"feedback" : $('#feedback'),
		"virtual" : "http://io.zachjohnson.name/"
	};

	/**
	 * Handle the AJAX forms.
	 */
	$('.form-ajax').submit(function(e) {
		e.preventDefault();
		
		var form = $(this);
		var list = $( form.attr('action') );
		var template = list.data('template');
		var data = form.serialize();
		
		$.post('app/ajax.php', data).done(function(json) {
			// console.log(json);
			feedback(json.message, json.level);
			var new_row = template;
			
			console.log(json.data);
			
			if( json.level == 'success' ) {
				$.each(json.data, function(key, value) {
					new_row = new_row.replace('{{' + key + '}}', value);
				});
				
				list.prepend(new_row);
			}
		});
	});

	/**
	 * Handle the AJAX delete.
	 */
	$('.table').on('click', '[data-action=delete]', function(e) {
		e.preventDefault();
		
		if( ! confirm('Are you sure you want to delete this entry?') )
			return false;
		
		var row = $(this).parents('tr');
		var data = {action: 'delete', id: $(this).data('id'), table: app_table.table, primary_key: app_table.primary_key};
		
		$.post('app/ajax.php', data).done(function(json) {
			feedback(json.message, json.level);
			
			if( json.level == 'success' ) {
				row.remove();
			}
		});
	});
		
	/**
	 * Return Bootstrap alert html
	 */
	function feedback(msg, lvl, dismissible) {
		app.feedback.html('');
		
		// do nothing if the message is blank
		if ( typeof msg === 'undefined' || msg == '' )
			return false;

		lvl = typeof lvl === 'undefined' ? 'info' : lvl;
		
		if( lvl == 'error' ) lvl = 'danger';
		
		dismissible = typeof dismissible === 'undefined' ? true : false;
		
		var alert = $('<div class="alert alert-' + lvl + ' alert-dismissible">' + ( dismissible == true ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '' ) + '' + msg + '</div>');
		
		app.feedback.html( alert );
		
		return this;
	}
	
});