<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>

        @include('layouts.partials.nav')

        <div class="container">

            @yield('content')

        </div>



        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>