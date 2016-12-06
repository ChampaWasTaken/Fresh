var DivResize = function(object, callback){
	this.object = object;
	this.height = object.height();
	this.width = object.width();

	this.interval = setInterval(this.checkResize(callback), 1000);
}

DivResize.prototype = {
	checkResize : function(callback){
		if(this.object.height() != this.height || this.object.width() != this.width){
			callback(this.height - this.object.height(), this.width - this.object.width());

			this.height = this.object.height();
			this.width = this.object.width();
		}
		alert();
	},

	stopCheck : function(){
		clearInterval(this.interval);
	}
}