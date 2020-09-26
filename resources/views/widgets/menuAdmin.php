<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <title>Админка</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Ranchers&display=swap" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">



              <a class="admin_link" href="<?=route('home')?>">На главную</a>



                    <div class="title m-b-md">
                      Сайт админки
                </div>
            </div>
        </div>
    </body>
</html>
