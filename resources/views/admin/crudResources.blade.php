@extends('layouts.app')

@section('title', 'Редактирование рубрик для парсинга')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Рубрики для редактирования')  }}</div>
                    <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      @forelse($resources as $res)
                      <h3>
                          {{ __($res->link) }}
                      </h3>

                      <p>
                      <form method="POST" action="{{ route('admin.resources.destroy', $res) }}">
                          <a class="btn btn-success" href="{{ route('admin.resources.edit', $res) }}">Редактировать</a>
                              @csrf
                              @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                              {{ __('Удалить') }}
                          </button>
                      </form>
                      </p>
                      @empty
                          {{ __('Список новостных ресурсов пуст!') }}
                      @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
