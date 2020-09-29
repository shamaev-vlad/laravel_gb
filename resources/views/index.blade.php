<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <title>Главная</title>


        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Ranchers&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">



?php include resource_path() . "/views/widgets/menu.php"; ?>

                    <div class="title m-b-md">
                      Главная
                </div>
            </div>
        </div>
    </body>
</html> -->
@extends('layouts.app')

@section('title', 'Главная')

@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Новости') }}</div>

                    <div class="card-body">
                        {{ __('Самые главные новости') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
