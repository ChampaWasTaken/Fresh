$(document).ready(function(){
	var debug_items = $(".debug_item"),
		debug_page = $(".debug_page"),
		debug_page_performance = $("#debug_page_performance"),
		debug_page_queries = $("#debug_page_queries"),
		debug_page_templates = $("#debug_page_templates"),
		debug_page_languages = $("#debug_page_languages"),
		debug_header = $("#debug_header"),
		debug_panel = $("#debug_panel"),
		debug_panel_open = false,
		debug_panel_collapsed = false,
		debug_execution_time = $("#debug_execution_time"),
		debug_execution_text = $("#debug_execution_text"),
		query_item = $(".query_item"),
		query_params = $(".query_params"),
		template_item = $(".template_item"),
		template_params = $(".template_params");


	debug_execution_time.css('width', (debug_execution_time.data('time')/5 * 100) + '%');

	template_item.click(function(){
		template_params.slideUp("fast");
		$("#template_params_" + $(this).data('id')).slideDown("fast");
	});

	query_item.click(function(){
		query_params.slideUp("fast");
		$("#query_params_" + $(this).data('id')).slideDown("fast");
	});

	debug_panel.contextmenu(function(e){
		e.preventDefault();

		if(!debug_panel_collapsed){
			debug_panel.addClass('collapse');
			debug_panel_collapsed = true;
		} else {
			debug_panel.removeClass('collapse');
			debug_panel_collapsed = false;
		}
	});

	debug_header.click(function(){
		if(!debug_panel_open){
			debug_panel.addClass('active');
			debug_panel_open = true;
		} else {
			debug_panel.removeClass('active');
			debug_panel_open = false;
		}
	});

	debug_items.click(function(){
		debug_page.hide();
		debug_items.removeClass('active');
		$(this).addClass('active');
		switch($(this).data('open')){
			case 'performance':
				debug_page_performance.show();
			break;

			case 'queries':
				debug_page_queries.show();
			break;

			case 'templates':
				debug_page_templates.show();
			break;

			case 'languages':
				debug_page_languages.show();
			break;
		}
	});
});