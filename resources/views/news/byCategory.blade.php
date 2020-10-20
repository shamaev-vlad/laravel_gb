@extends('layouts.app')

@if ($category)
    @section('title', $category->title)
@endif
@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($category)
                    <div class="card-header">Новости категории: {{ $category->title  }}</div>
                @else
                    <div class="card-header">{{ __('Рубрика отсутсвует!')  }}</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($news)
                        @forelse($news as $item)
                            <h4>{{ __($item['title']) }}</h4>
                            @if (!$item['isPrivate']==1)
                                <a class="card-body_link"
                                   href="{{ route('news.newsOne', $item['id']) }}">{{ __('Подробнее...') }}
                                </a>
                            @else
                                <a class="card-body_link"
                                   href="{{ route('register') }}">{{__('Зарегистрироваться, чтобы увидеть подробности')}}
                                </a>
                            @endif
                        @empty
                            {{ __('Нет новостей!') }}
                        @endforelse
                    @else
                        {{ __('Нет новостей') }}
                    @endif

                    {{ $news->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
