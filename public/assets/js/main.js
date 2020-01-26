$(document).ready(function(){

	$(document).on('click','.place_togo',function(e){
		e.preventDefault();

		var place = $(this).text();
		var id    = $(this).attr('data-id');

		$('input[name=auto_suggest]').val(place);
		$('input[name=hidden_place_id]').val(id);
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
	 		$('.recommendations_pagination_container').html(result);
			randomBackground();

			$("html, body").animate({
		        scrollTop: 500
		    }, 800);
		}});
	});

	$('input[name=auto_suggest]').on('keyup',function(){
		searchPlace($(this).val());		
	});

	$('form#search_form').submit(function(e){
		e.preventDefault();
	});

	function searchPlace(place){
		$.ajaxSetup({
		  headers: {
		      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		  }
		});

		var place = place;

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
	}


	function randomBackground()
	{

		$('.recommendation_details').each(function(i, obj) {
			var n1 = Math.floor(Math.random() * 255);
			var n2 = Math.floor(Math.random() * 255);
			var n3 = Math.floor(Math.random() * 255);
		    $(this).css('background','rgba('+n1+','+n2+','+n3+',0.5)');
		});
	}
})


