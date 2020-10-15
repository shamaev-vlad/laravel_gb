@extends('layouts.app')

@section('title', 'Редактирование рубрик')

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
                        @forelse($categories as $category)
                            <h3>
                                {{ __($category->title ) }}
                            </h3>
                            <p>
                            <form method="POST" action="{{ route('admin.category.destroy', $category) }}">
                                <a class="btn btn-success" href="{{ route('admin.category.edit', $category) }}">Редактировать</a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Удалить') }}
                                </button>
                            </form>
                            </p>
                        @empty
                            {{ __('Список новостных рубрик пуст!') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
