<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google_Map</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <!-- <div id="app">
        <app-component></app-component>
    </div> -->
    <?php
    var_dump($product);
    var_dump($place);
    ?>

    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>