$(document).ready(function(){

	$(document).on('click','.place_togo',function(e){
		e.preventDefault();

		var place = $(this).text();
		var id    = $(this).attr('data-id');

		$('input[name=auto_suggest]').val(place);
		$('.auto_suggested_places').hide().fadeOut().remove();

		$.ajaxSetup({
		  headers: {
		      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		  }
		});

		jQuery.ajax({
			url: "/api/v1/importer/place/details/"+id,
			method: 'get',
			data: {
			 id: id
		},
		success: function(result){
	 		$('body').html(result);
		}});
	});

	$('input[name=auto_suggest]').on('keyup',function(){
		$.ajaxSetup({
		  headers: {
		      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		  }
		});

		var place = $(this).val();

		if (place.length == 0)
			$('.auto_suggested_places').hide().fadeOut().remove();

		jQuery.ajax({
			url: "/api/v1/importer/place/search/"+place,
			method: 'get',
			data: {
			 place: place
		},
		success: function(result){
	 		if(result.message == "Success."){
	 			$('.auto_suggested_places').remove();

	 			var html = "<div class='auto_suggested_places'>";
	 			
	 			if(result.data != '[]'){
		 			$.each(result.data,function(index,value){
		 				html += "<p><a href='#' title='"+value.name+"' class='place_togo' data-id="+value.id+">"+value.name+"</a></p>";
		 			});
	 			}

	 			html += "</div>";

	 			$(html).hide().appendTo(".search_bar").fadeIn();
	 		}else{
	 			$('.auto_suggested_places').hide().fadeOut().remove();
	 			$("<div class='auto_suggested_places'><p>No Match Found.</p></div>").hide().appendTo(".search_bar").fadeIn();
	 		}
		}});

	});
})


