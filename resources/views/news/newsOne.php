<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <title>Новость</title></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Ranchers&display=swap" rel="stylesheet">


    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">

              <?php
              include resource_path() . "/views/widgets/menu.php";
              ?>
              <h2 class="header"><?= $news['title'] ?></h2>
              <p class="rubric"><?= $news['text'] ?></p>

            </div>
        </div>
    </body>
</html>
