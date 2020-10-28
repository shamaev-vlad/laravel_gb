@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Административная панель') }}</div>
                    <div class="card-body list-unstyled">
                      @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Добавляйте новость или новостную рубрику, а так же можете отредактировать имеющиеся') }}
                        <li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
                               <a class="card-body_link" href="{{ route('admin.news.index') }}">{{ __('Редактирование новостей') }}</a>
                           </li>
                        <li class="nav-item {{ request()->routeIs('admin.category.index')?'active':'' }}">
                               <a class="card-body_link" href="{{ route('admin.category.index') }}">{{ __('Редактирование рубрик') }}</a>
                            </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
