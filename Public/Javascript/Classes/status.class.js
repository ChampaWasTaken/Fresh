var Status = function(){
	this.profileData = $("#my_profile_data");
	this.loadedComments = [];
}

Status.prototype = {
	_ucitajkomentare : function(comment_input){
		var
			$this = this,
			status_id = comment_input.data('postid'),
			loader = $("#status_loader_" + status_id);

		if(typeof($this.loadedComments[status_id]) == 'undefined' || !$this.loadedComments[status_id]){
			loader.fadeIn("fast");
			
			$.ajax({
				url: '/ucitajkomentare',
				type: 'POST',
				data: 'status_id=' + status_id,
				success: function(data){
					loader.hide();

					$this.loadedComments[status_id] = true;
					if(data != ''){
						$("#comments_list_" + status_id).html(data).slideDown("fast");
						$("#comment_controlls_" + status_id).addClass('active');
					}
				}
			});
		}
	},

	_dodajkomentar : function(form){
		var
			$this = this,
			input = $("#comment_input_" + form.data('postid'));

		if(input.val() != '')
			$.ajax({
				url: '/dodajkomentar',
				type: 'POST',
				data: {
					csts: form.data('postid'),
					cinp: input.val()
				},
				success: function(data){
					$("#comments_list_" + form.data('postid')).prepend('<div class="comment_holder">' +
						'<img src="' + $this.profileData.data('avatar') + '" class="avatar">' +
						'<div class="comment_content">' +
							'<p class="posterinfo"><strong>' + $this.profileData.data('imeprezime') + '</strong>, Upravo sada</p>' +
							'<p>' + input.val() + '</p>' +
						'</div>' +
					'</div>');

					Materialize.toast('Uspjesno ste komentarisali', 1500);
					input.val('');
				}
			});
		else
			Materialize.toast('Unesite komentar', 1500);
	},

	_likestatus : function(button){
		var
			$this = this,
			status_id = button.data('postid');

		$.ajax({
			url: '/lajkstatus',
			type: 'POST',
			data: 'status_id=' + status_id,
			success: function(data){
				if(data == 1){
					$("#like_status_" + status_id).html('<i class="fa fa-times"></i>');
					Materialize.toast('Lajkali ste status', 1500);
				} else {
					$("#like_status_" + status_id).html('<i class="fa fa-thumbs-up"></i>');
					Materialize.toast('Uklonili ste lajk sta statusa', 1500);
				}
			}
		});
	}
}