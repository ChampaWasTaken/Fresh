'use strict';

var
	prevButtonContent = [];

$.fn.buttonLoader = function (tog){
	if(tog){
		prevButtonContent[this.selector] = this.html();
		this.html('<i class="fa fa-spinner fa-pulse fa-fw buttonLoader"></i>');
		this.addClass('disabled');
		this.removeClass('waves-effect');
		this.attr('disabled', 'disabled');
	} else {
		this.html(prevButtonContent[this.selector]);
		this.removeClass('disabled');
		this.removeAttr('disabled');
		this.addClass('waves-effect');
	}
};

function validEmail(string) {
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return regex.test(string);
}

function striptags(string){
	return string.replace(/\<(?!img).*?\>/g, "");
}
