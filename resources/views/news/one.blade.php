@extends('layouts.app')

@if ($news)
  @section('title', $news->title)
@endif
@section('menu')
    @include('widgets.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  @if ($news)
                  <div class="card-header">{{ __($news->title)  }}</div>
                  @else
                        <div class="card-header">{{ __('Новость!')  }}</div>
                    @endif
                    <div class="card-body">
                      <div style="margin: 0 0 25px 0">
                        <a href="{{ route('news.index') }}">Назад</a>
                      </div>
                      <div >
                          <img class="card-img-top" src="{{ $news->image ?? asset('default.jpg')}}">
                      </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if ($news)

                                    <p style="margin-top: 25px;">{!! $news->text !!}</p>

                            @else
                                <p>{{ __('Нет новости с таким id') }}</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
