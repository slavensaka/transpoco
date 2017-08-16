<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <script>
		    var ajax_url = '{{ url('/') }}';
		    var token = '{{ csrf_token() }}';
		    var _locale = '{{ App::getLocale() }}';
		</script>
    </head>
    <body>
        <div >

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>



                <div id="app">
                	<example></example>
                </div>
            </div>
        </div>
    </body>

     <script src="js/app.js" charset="utf-8"></script>﻿
     <script>

     	// GET /someUrl
  // this.$http.get('/someUrl').then(response => {

  //   // get body data
  //   this.someData = response.body;

  // }, response => {
  //   // error callback
  // });
     </script>
</html>
