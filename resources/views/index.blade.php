<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Главная</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Ranchers&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #d4eaff;
                color: #636b6f;
                font-family: 'Ranchers', sans-serif;
                font-weight: 400;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                padding-top: 250px;
                margin-bottom: 60px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">


                <div class="links">
                    <a href="/">Главная</a>
                    <a href="/about">О нас</a>
                    <a href="/contacts">Контакты</a>

                    <div class="title m-b-md">
                      Главная
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
