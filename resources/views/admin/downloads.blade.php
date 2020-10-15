@extends('layouts.app')

@section('title', 'Загрузить')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Панель выгрузки данных') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h4>
                                <a class="nav-link card-body_link" href="{{ route('admin.download.news.json') }}">{{ __('Загрузить новости в формате JSON') }}</a>
                            </h4>
                            <h4>
                                <a class="nav-link card-body_link" href="{{ route('admin.download.categories.json') }}">{{ __('Загрузить рубрики в формате JSON') }}</a>
                            </h4>
                            <h4>
                                <a class="nav-link card-body_link" href="{{ route('admin.download.news.xls') }}">{{ __('Загрузить новости в формате Excel') }}</a>
                            </h4>
                            <h4>
                                <a class="nav-link card-body_link" href="{{ route('admin.download.categories.xls') }}">{{ __('Загрузить рубрики в формате Excel') }}</a>
                            </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
