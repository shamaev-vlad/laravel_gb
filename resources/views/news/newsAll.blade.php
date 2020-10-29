@extends('layouts.app')

@section('title', 'Новости')


@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">{{ __('Полный список новостей')  }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($news)
                            @forelse($news as $item)
                            <img class="card-img-top" src="{{ $news->image ?? asset('default.jpg')}}">
                                <h4>{{ __($item->title) }}</h4>

                                    <a class="card-body_link"
                                       href="{{ route('news.newsOne', $item->id) }}">{{ __('Подробнее...') }}
                                    </a>

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
