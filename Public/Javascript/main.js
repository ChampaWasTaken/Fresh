'use strict';

var
	chatboxSelected,
	activeChats = [],
	chatbox = [],
	client,
	fileUploadInProgress = false;

$(document).ready(function(){
	var
		main_topbar = $("#main_topbar"),
		main_search = $("#main_search"),
		main_search_input = $("#main_search_input"),
		menu_more = $("#menu_more"),
		menu_more_icon = $("#menu_more_icon"),
		more_box = $("#more_box"),
		main_button_logout = $("#main_button_logout"),
		search_results = $("#search_results"),
		more_box_open = false,
		mobile_search_bar = $("#mobile_search_bar"),
		mobile_search = $("#mobile_search"),
		close_mobile_search = $("#close_mobile_search"),
		mobile_search_input = $("#mobile_search_input"),
		mobile_search_results = $("#mobile_search_results"),
		topbar_dropdown_messages = $("#topbar_dropdown_messages"),
		topbar_message_button = $("#topbar_message_button"),
		topbar_message_loaded_at = 0,
		topbar_message_open = false,
		isDraggingChatbox = false,
		chatboxSelectedId = 0,
		emojisLoaded = false,
		notifikacija = document.getElementById("notifikacija_zvuk");

	client = new Client(9014, $("#my_profile_data").data('id'));

	$(document).delegate('.chatbox', 'mousedown', function(){

		chatboxSelected = $("#chatbox_" + $(this).data('id'));
		chatboxSelectedId = $(this).data('id');

		$(".chatbox").removeClass("active z-depth-2");
		$(".chatbox").addClass("z-depth-1");

		chatboxSelected.addClass("active z-depth-2");
		chatboxSelected.removeClass("z-depth-1");
	});

	$(document).delegate('.chatbox_upload_image', 'change', function(){
		if(!fileUploadInProgress){
			fileUploadInProgress = true;
			
			var
				props = $(this).prop('files')[0],
				image_data = new FormData(),
				id = $(this).data('id');

			$("#hidable_controls_" + id).hide();
			$("#hidable_progress_" + id).show();
			
			image_data.append('file', props);

			$.ajax({
				url		: '/uploadimage',
				type	: 'POST',
				dataType: 'text',
				cache	: false,
				contentType: false,
				processData: false,
				data	: image_data,
				success	: function(data){
					$("#hidable_controls_" + id).show();
					$("#hidable_progress_" + id).hide();
					fileUploadInProgress = false;
					chatbox[id].sendMessage(client, data);
				},
				error: function(){
					fileUploadInProgress = false;
				}
			});
		} else
			Materialize.toast('Fajl se vec uploaduje', 1500);
	});

	$(document).delegate('.chatbox_upload_file', 'change', function(){
		if(!fileUploadInProgress){
			fileUploadInProgress = true;
			
			var
				props = $(this).prop('files')[0],
				file_data = new FormData(),
				id = $(this).data('id');

			$("#hidable_controls_" + id).hide();
			$("#hidable_progress_" + id).show();
			
			file_data.append('file', props);

			$.ajax({
				url		: '/uploadfile',
				type	: 'POST',
				dataType: 'text',
				cache	: false,
				contentType: false,
				processData: false,
				data	: file_data,
				success	: function(data){
					$("#hidable_controls_" + id).show();
					$("#hidable_progress_" + id).hide();
					fileUploadInProgress = false;
					data = jQuery.parseJSON(data);
					chatbox[id].sendMessage(client, '', data.id, data.tip, data.naziv);
				},
				error: function(){
					fileUploadInProgress = false;
				}
			});
		} else
			Materialize.toast('Fajl se vec uploaduje', 1500);
	});

	$(document).delegate('.chatbox_loadmore', 'click', function(){
		var
			id = $(this).data('id'),
			$this = $(this);

		$this.buttonLoader(true);

		if(!$this.data('stop'))
			$.ajax({
				url: '/ucitajporuke',
				type: 'POST',
				data: {
					id: id,
					off: $(this).data('off')
				},
				success: function(data){
					if(data != ''){
						$this.data('off', $this.data('off') + 10);
						$("#chatbox_text_appender_" + id).prepend(data);
						$('.tooltipped').tooltip({delay: 10});
					} else {
						$this.data('stop', true);
						$("#chatbox_loadmore_" + id).remove();
					}
					$this.buttonLoader(false);
				},
				error: function(){
					$this.buttonLoader(false);
				}
			});
	});

	$(document).delegate('.topbar_message', 'click', function(){
		var
			id = $(this).data('convid');

		if(!activeChats[id]){
			activeChats[id] = true;
			chatbox[id] = new Chatbox(id, $(this).data('imeprezime'));
			$("#chatbox_input_" + id).focus();
		} else {
			var dom = $("#chatbox_" + id);

			dom.css({
				'bottom': '5px',
				'right': '5px'
			}).show();
		}
	});

	$(document).delegate('.chatbox_input', 'keyup', function(e){
		if(e.keyCode == 13){
			chatbox[$(this).data('id')].sendMessage(client, $(this).html());
			$("#chatbox_tab_" + $(this).data('id')).fadeOut("fast");
			$(this).html('');
		} else if((e.keyCode == 8 || e.keyCode == 46) && $(this).html() == '') {
			chatbox[$(this).data('id')].stopWriting(client);
		} else {
			chatbox[$(this).data('id')].startWriting(client);
		}
	});

	client.on('chatbox_recieve', function(data){
		var cheader = $("#chatbox_header_" + data.user.id);

		$("#message_window_" + data.user.id).append('<div class="them">' +
					'<a href="/profil/' + data.user.id + '">' +
						'<img src="' + data.user.avatar + '" class="avatar">' +
					'</a>' +
					'<div class="content">' +
						data.text + 
					'</div>' +
				'</div>').scrollTop(100000);
		cheader.text(cheader.data('imeprezime'));
		$('.materialboxed').materialbox();

		notifikacija.play();
	});

	client.on('on_chatbox_stop_writing', function(data){
		var cheader = $("#chatbox_header_" + data);

		cheader.text(cheader.data('imeprezime'));
	});

	client.on('chatbox_recieve_writing', function(data){
		
		var cheader = $("#chatbox_header_" + data);

		cheader.html('<span title="Korisnik pise..."><i class="fa fa-pencil-square-o"></i> ' + cheader.data('imeprezime') + '</span>');
	});

	$(document).delegate('.chatbox_header', 'mousedown', function(){
		isDraggingChatbox = true;
	});

	$(document).delegate('.chatbox_add_emoji', 'click', function(){

		var input = $("#chatbox_input_" + chatboxSelectedId);

		if(input.text() == input.attr('placeholder'))
			input.text('');

		input.html(input.html() + '<img src="' + $(this).attr('src') + '" class="emoji">');
	});

	$(document).delegate('.chatbox_load_emoji', 'click', function(){
		if(!emojisLoaded)
			$.ajax({
				url: '/ucitajemoji',
				type: 'POST',
				success: function(data){
					$(".emoji_list").html(data);
					emojisLoaded = true;
				}
			});
		$("#chatbox_tab_" + $(this).data('id')).fadeToggle("fast");
	});

	$(document).delegate('.chatbox_maximize', 'click', function(){
		var
			chatboxId = $(this).data('id'),
			boxDOM = $("#chatbox_" + chatboxId);

		if(!boxDOM.data('maximized')){
			$("#darkenChatboxBg_" + chatboxId).addClass('active');
			boxDOM.addClass('maximized');
			boxDOM.data('maximized', true);
		} else {
			$("#darkenChatboxBg_" + chatboxId).removeClass('active');
			boxDOM.removeClass('maximized');
			boxDOM.data('maximized', false);
		}
	});

	$(document).delegate('.chatbox_minimize', 'click', function(){
		var
			chatboxId = $(this).data('id'),
			boxDOM = $("#chatbox_" + chatboxId);

		if(!boxDOM.data('maximized')){
			if(!boxDOM.data('collapsed')){
				boxDOM.addClass('collapseIt');
				boxDOM.data('collapsed', true);
				boxDOM.css('top', boxDOM.offset().top - $(window).scrollTop() + 350 + 'px');
			} else {

				if(parseInt(boxDOM.css('top'), 10) - 350 < 40){
					boxDOM.css('top', '50px');
				} else {
					boxDOM.css('top', parseInt(boxDOM.css('top'), 10) - 350 + 'px');
				}

				boxDOM.removeClass('collapseIt');
				boxDOM.data('collapsed', false);
			}
		}
	});

	$(document).delegate('.chatbox_close', 'click', function(){
		var
			chatboxId = $(this).data('id');

		$("#chatbox_" + chatboxId).remove();
		activeChats[chatboxId] = false;
	});

	$(document).delegate('.chatbox_input', 'focus', function(){
		if($(this).text() == $(this).attr('placeholder'))
			$(this).text('');
	});

	$(document).delegate('.chatbox_input', 'blur', function(){
		if($(this).html() == ''){
			var placeholder = $(this).attr('placeholder');
			$(this).text(placeholder);
		}
	});

	$(document).mousemove(function(e){
		if(isDraggingChatbox){
			if(!chatboxSelected.data('collapsed')){
				if(e.pageX + 150 > $(window).width() && e.pageY - $(window).scrollTop() + 380 <= $(window).height())
					chatboxSelected.css({
						'top' : e.pageY - $(window).scrollTop() + "px",
					});
				else if(e.pageY - $(window).scrollTop() + 380 > $(window).height())
					chatboxSelected.css({
						'left' : e.pageX - 100 + "px"
					});
				else
					chatboxSelected.css({
						'top' : e.pageY - $(window).scrollTop() + "px",
						'left' : e.pageX - 100 + "px"
					});
			} else {
				if(e.pageX + 150  > $(window).width() && e.pageY - $(window).scrollTop() + 30 <= $(window).height())
					chatboxSelected.css({
						'top' : e.pageY - $(window).scrollTop() + "px",
					});
				else if(e.pageY - $(window).scrollTop() + 30 > $(window).height())
					chatboxSelected.css({
						'left' : e.pageX - 100 + "px"
					});
				else
					chatboxSelected.css({
						'top' : e.pageY - $(window).scrollTop() + "px",
						'left' : e.pageX - 100 + "px"
					});
			}

		}
	});

	topbar_message_button.click(function(){
		if(!topbar_message_open){
			if(topbar_message_loaded_at == 0 || Math.round(+new Date() / 1000) - topbar_message_loaded_at >= 180){
				topbar_dropdown_messages.show();
				$.ajax({
					url: '/topbarporuke',
					type: 'POST',
					success: function(data){
						topbar_dropdown_messages.html(data);
						topbar_message_loaded_at = Math.round(+new Date() / 1000);
					}
				});
			} else {
				topbar_dropdown_messages.slideDown("fast");
			}

			topbar_message_open = true;
		}
	});

	mobile_search.click(function(){
		mobile_search_bar.addClass("active");
		main_topbar.addClass("mobileSearchActive");
		mobile_search_results.fadeIn("fast");
	});

	close_mobile_search.click(function(){
		mobile_search_bar.removeClass("active");
		main_topbar.removeClass("mobileSearchActive");
		mobile_search_results.fadeOut("fast");
	});


	main_button_logout.click(function(){
		$.ajax({
			url: '/odjava',
			type: 'POST',
			success: function(data){
				location.href = '/prijava';
			}
		});
	});

	menu_more.click(function(){
		if(!more_box_open){
			more_box.slideDown(function(){
				menu_more_icon.addClass('rotateIcon');
				more_box_open = true;
			});
		}
	});

	mobile_search_input.keyup(function(e){
		if(e.keyCode != 8)
			$.ajax({
				url: '/simplepretraga',
				type: 'POST',
				data: 'q=' + mobile_search_input.val(),
				success: function(data){
					if(data == '')
						mobile_search_results.html('<ul>' +
								'<p class="no_results">' +
									'<i class="fa fa-frown-o" aria-hidden="true"></i>' +
									' Nema rezultata' +
								'</p>' +
							'</ul>');
					else
						mobile_search_results.html(data);
				}
			});
	});

	main_search_input.keyup(function(e){
		if(e.keyCode != 8)
			$.ajax({
				url: '/simplepretraga',
				type: 'POST',
				data: 'q=' + main_search_input.val(),
				success: function(data){
					if(data == '')
						search_results.html('<ul>' +
								'<p class="no_results">' +
									'<i class="fa fa-frown-o" aria-hidden="true"></i>' +
									' Nema rezultata' +
								'</p>' +
							'</ul>');
					else
						search_results.html(data);
				}
			});
	});

	main_search_input.focus(function(){
		main_search.addClass('active');
		search_results.fadeIn(200);
	});

	$(document).mouseup(function(e){

		if(chatboxSelected != null && !chatboxSelected.is(e.target) && chatboxSelected.has(e.target).length === 0){
			chatboxSelected.removeClass("active z-depth-2");
			chatboxSelected.addClass("z-depth-1");
			chatboxSelected = null;
		}

		if(isDraggingChatbox) isDraggingChatbox = false;

		if(!topbar_dropdown_messages.is(e.target) && topbar_dropdown_messages.has(e.target).length === 0){
			if(topbar_message_open){
				topbar_dropdown_messages.slideUp();
				topbar_message_open = false;
			}
		}

		if(!main_search.is(e.target) && main_search.has(e.target).length === 0
			&& !search_results.is(e.target) && search_results.has(e.target).length === 0){
			main_search.removeClass('active');
			search_results.fadeOut(200);
		}

		if(!more_box.is(e.target) && more_box.has(e.target).length === 0){
			if(more_box_open){
				more_box.slideUp(function(){
					menu_more_icon.removeClass('rotateIcon');
					more_box_open = false;
				});
			}
		}
    });
});