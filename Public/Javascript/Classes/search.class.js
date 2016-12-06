var Search = function(){

}

Search.prototype = {
	simple : function(search, $results){
		$.ajax({
			url: '/simplepretraga',
			type: 'POST',
			data: 'q=' + search,
			success: function(data){
				if(data == '')
					console.log();
				else
					$results.html(data);
			}
		});
	}
}