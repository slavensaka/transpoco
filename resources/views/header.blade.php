<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="{!! asset('css/pnotify.custom.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="{!! asset('js/pnotify.custom.min.js') !!}"></script>
        <title>Laravel</title>
        <script>
		    var ajax_url = '{{ url('/') }}';
		    var token = '{{ csrf_token() }}';
		    var _locale = '{{ App::getLocale() }}';
		</script>
    </head>
    <body>