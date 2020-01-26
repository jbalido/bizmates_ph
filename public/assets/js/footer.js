$(window).on('hashchange', function() {

        if (window.location.hash) {

            var page = window.location.hash.replace('#', '');

            if (page == Number.NaN || page <= 0) {

                return false;

            }else{

                getData(page);

            }

        }

    });



$(document).ready(function()

{

     $(document).on('click', '.pagination a',function(event)

    {
        event.preventDefault();

        $('li').removeClass('active');

        $(this).parent('li').addClass('active');

        var myurl = $(this).attr('href');

        var page=$(this).attr('href').split('page=')[1];

        getData(page);

    });

});



function getData(page){
        var id = $('input[name=hidden_place_id]').val();
        
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });

        jQuery.ajax({
            url: "/api/v1/importer/place/details/"+id+"?page=" + page,
            method: 'get',
            data: {
             id: id
        },
        success: function(result){
            $('.recommendations_pagination_container').html(result);
            randomBackground();

            $("html, body").animate({
                scrollTop: 300
            }, 800); 
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