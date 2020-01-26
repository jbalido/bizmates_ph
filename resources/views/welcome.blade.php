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
    
        <section>
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-10 offset-1 mt-5 mb-3 pt-5 pb-2">
                            <div class="content">
                                <div class="title m-b-md">
                                    <h1 class="display-1 font-weight-bolder">Welcome to Japan!</h1>
                                    <h2>日本へようこそ</h2>
                                </div>

                                <div class="form_container">
                                    <h3>
                                        <span class="slogan_1">Wander.</span>
                                        <span class="slogan_2">Explore.</span>
                                        <span class="slogan_3">Discover.</span>
                                    </h3>
                                    <form id='search_form'>
                                        <div class="form-row mt-5">
                                            <div class="col-12">
                                                <div class="inner-addon right-addon search_bar">
                                                  <i class="glyphicon glyphicon-search"></i>
                                                  <input type="text" class="transparent-input" placeholder="Know your destination . . . 目的地を知る . . ." name="auto_suggest" />
                                                  <input type='hidden' name='hidden_place_id'>
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

        <section class="recomm_section"> 
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div id="recommendations_container">
                                @include('presult')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ URL::to('/assets/js/footer.js') }}"></script>
    </body>
</html>
