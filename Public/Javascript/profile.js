'use strict';

$(document).ready(function(){
	
	var
		status = new Status();

	$(document).delegate('.submit_comment', 'click', function(e){
		e.preventDefault();

		status._dodajkomentar($(this));
	});

	$(document).delegate('.add_comment', 'click', function(){

		status._ucitajkomentare($(this));
	});
	
	$(document).delegate('.like_status', 'click', function(){

		status._likestatus($(this));
	});

	$("#send_message").click(function(){
		var
			id = $(this).data('id');

		if(!activeChats[id]){
			activeChats[id] = true;
			chatbox[id] = new Chatbox(id, $(this).data('imeprezime'));
		} else {
			var dom = $("#chatbox_" + id);

			dom.css({
				'bottom': '5px',
				'right': '5px'
			}).show();
		}
	});
});