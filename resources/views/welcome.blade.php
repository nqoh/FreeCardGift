<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
    @include('new')
    <h3>Thandeka</h3>
    @csrf
    @foreach($users as $user )
        <h2>{{$user}}</h2>
    @endforeach
        <div id="app">
             <app></app>
        </div> 
    </body>
    <script>
        var data = @json($users);
        console.warn(data);
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
