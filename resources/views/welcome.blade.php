<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::to('/assets/css/main.css') }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="{{ URL::to('/assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ URL::to('/assets/js/main.js') }}"></script>
    </head>
    <body>
        <img id="background-img" src="{{ URL::to('/assets/img/12202.jpg') }}">
        <div class="flex-center position-ref full-height">
            
            <section>
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <h1 class="display-1 font-weight-bolder">Welcome to Japan!</h1>
                                        <h2>日本へようこそ</h2>
                                    </div>

                                    <div>
                                        <h3>Please enter your destination</h3>
                                        <form id='search_form'>
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <div class="inner-addon right-addon search_bar">
                                                      <i class="glyphicon glyphicon-search"></i>
                                                      <input type="text" class="transparent-input" placeholder="Search . . ." name="auto_suggest" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section> 
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div id="recommendations_container">
                                    @include('presult')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        
        <script type="text/javascript">

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

                    $.ajax(

                    {

                        url: '?page=' + page,

                        type: "get",

                        datatype: "html"

                    })

                    .done(function(data)

                    {

                        $("#tag_container").empty().html(data);

                        location.hash = page;

                    })

                    .fail(function(jqXHR, ajaxOptions, thrownError)

                    {

                          alert('No response from server');

                    });

            }

        </script>
    </body>
</html>
