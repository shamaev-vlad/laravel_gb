<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <title>Главная</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Ranchers&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">



<?php include resource_path() . "/views/widgets/menu.php"; ?>

                    <div class="title m-b-md">
                      Главная
                </div>
            </div>
        </div>
    </body>
</html>
