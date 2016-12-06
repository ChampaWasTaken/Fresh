var Chatbox = function(id, imeprezime){
	var $this = {};

	$this.id = id;

	$.ajax({
		url: '/ucitajchatbox',
		type: 'POST',
		data: {
			'id' : id,
			'imeprezime' : imeprezime
		},
		success: function(data){
			$("#chatbox_appender").append(data);
			$this.object = $("#chatbox_" + id);
			$this.object.addClass('active');
			chatboxSelected = $this.object;
			$('.tooltipped').tooltip({delay: 10});
			$('.materialboxed').materialbox();
			$("#message_window_" + id).scrollTop(100000);
			$("#chatbox_input_" + id).focus();
		}
	});

	$.extend(true, this, $this);
}

Chatbox.prototype = {
	show : function(){
		this.object.fadeIn("fast");
	},

	hide : function(){
		this.object.fadeOut("fast");
	},

	startWriting : function(client){
		var
			id = this.id,
			myid = $("#my_profile_data").data('id');

		client.emit('chatbox_writing', {
			id: id,
			user_id: myid
		});
	},

	stopWriting : function(client){
		var
			id = this.id,
			myid = $("#my_profile_data").data('id');

		client.emit('chatbox_stop_writing', {
			id: id,
			user_id: myid
		});
	},

	sendMessage : function(client, text, isFile = 0, fileType = null, fileName = ''){

		var id = this.id;
		profile_data = $("#my_profile_data");
		text = striptags(text);

		/**
		 * Saljemo poruku ka node serveru da bi mogli prikazati drugoj osobi
		 */

		client.emit('chatbox_send', {
			id: id,
			text: text,
			user : {
				avatar: profile_data.data('avatar'),
				imeprezime: profile_data.data('imeprezime'),
				id: profile_data.data('id')
			}
		});

		/**
		 * Saljemo poruku u bazu
		 */

		$.ajax({
			url: '/posaljiporuku',
			type: 'POST',
			data: {
				id: id,
				text: text,
				file: isFile
			},
			success: function(data){
				if(isFile == 0){
					$("#message_window_" + id).append('<div class="you">' +
						'<div class="content_holder">' +
								'<div class="content">' +
									text +
								'</div>' +
							'</div>' +
						'</div>');
					$('.materialboxed').materialbox();
				} else {
					switch(fileType){
						default:
							$("#message_window_" + id).append('<div class="you">' +
								'<div class="content_holder">' +
										'<div class="content">' +
											'<a href="filedw/' + isFile + '">' +
												'<i class="fa fa-file" aria-hidden="true"></i> ' + fileName +
											'</a>' +
										'</div>' +
									'</div>' +
								'</div>');
						break;
					}
				}

				$("#message_window_" + id).scrollTop(100000);
			}
		});
	}
}