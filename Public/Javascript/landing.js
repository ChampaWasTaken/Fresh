$(document).ready(function(){

	var
		register_razred = $("#register_razred"),
		register_smjer = $("#register_smjer"),
		register_ime = $("#register_ime"),
		register_prezime = $("#register_prezime"),
		register_lozinka = $("#register_lozinka"),
		register_lozinka2 = $("#register_lozinka2"),
		register_email = $("#register_email"),
		register_form = $("#register_form"),
		register_button = $("#register_button"),
		login_form = $("#login_form"),
		login_email = $("#login_email"),
		login_lozinka = $("#login_lozinka"),
		login_button = $("#login_button");

	login_form.submit(function(e){
		e.preventDefault();

		if(login_email.val() != '' && login_lozinka.val() != ''){

			login_button.buttonLoader(true);

			$.ajax({
				url : '/authentikacija',
				type : 'POST',
				data : $(this).serialize(),
				success : function(data){

					login_button.buttonLoader(false);
					
					if(data == 0)
						location.href = '/';
					else if(data == 1)
						Materialize.toast('Nalog sa tim emailom ne postoji', 2000);
					else
						Materialize.toast('Lozinka nije tacna', 2000);
				}
			});
		}
	});

	register_form.submit(function(e){
		e.preventDefault();

		if(register_ime.val() != '' && register_prezime.val() != '' && register_lozinka.val() != ''
			&& register_lozinka2.val() != '' && register_email.val() != ''){

			if(!validEmail(register_email.val()))
				Materialize.toast('Unesite ispravan email', 2000);
			else if(register_lozinka.val() != register_lozinka2.val())
				Materialize.toast('Lozinke se ne poklapaju', 2000);
			else if(register_razred.val() == 0)
				Materialize.toast('Odaberite vas razred', 2000);
			else if(register_razred.val() > 2 && register_smjer.val() == 0)
				Materialize.toast('Odaberite vas smjer', 2000);
			else {
				register_button.buttonLoader(true);

				$.ajax({
					url : '/do_registracija',
					type : 'POST',
					data : $(this).serialize(),
					success : function(data){

						register_button.buttonLoader(false);

						if(data == 1)
							Materialize.toast('Taj email je vec u upotrebi', 2000);
						else
							location.href = '/prijava';
					}
				});
			}
		} else
			Materialize.toast('Popunite sva polja', 2000);
	});

	register_razred.change(function(){
		$("#razred_default").attr('disabled', 'disabled');

		if(register_razred.val() > 2)
			register_smjer.show();
		else
			register_smjer.hide();
	});

	register_smjer.change(function(){
		$("#smjer_default").attr('disabled', 'disabled');
	});
});