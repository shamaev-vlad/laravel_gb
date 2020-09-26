<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <title>Новости в рубрике</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Ranchers&display=swap" rel="stylesheet">


    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
              <?php
              include resource_path() . "/views/widgets/menu.php";
              ?>

              <h2 class="header">Новости в рубрике: <?= $rubric ?> </h2>

              <?php foreach ($news as $item): ?>

                  <h3><a class="news_link" href="<?=route('news.newsOne', $item['id']) ?>"><?= $item['title'] ?></a></h3>

              <?php  endforeach; ?>
            </div>
        </div>
    </body>
</html>
