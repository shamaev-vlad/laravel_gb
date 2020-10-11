@extends('layouts.app')
@if($news->id)
    @section('title', 'Админка | Обновить новость')
@else
    @section('title', 'Админка | Добавить новость')
@endif

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($news->id)
                         <div class="card-header">{{ __('Обновление новости') }}</div>
                     @else
                      <div class="card-header">{{ __('Добавление новости') }}</div>
                       @endif
                    <div class="card-body">
                        <form method="POST" action="@if ($news->id){{  route('admin.news.update', $news) }} @else {{ route('admin.news.store') }}@endif">
                            @csrf
                            @if($news->id)
                                @method('PUT')
                            @endif

                            <input hidden id="id" type="number" name="id" value="0">
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Заголовок') }}</label>

                                <div class="col-md-8">
                                    <input id="title" type="text"
                                     class="form-control @error('title') is-invalid @enderror" name="title"
                                     value="{{ old('title') ?? $news->title}}" required autocomplete="title"
                                     autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Текст новости') }}</label>

                                <div class="col-md-8">
                                    <textarea id="text" class="form-control @error('text') is-invalid @enderror"
                                     name="text" rows="5" required autocomplete="text">{{ old('text') ?? $news->text }}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Категория') }}</label>
                                <div class="col-md-8">
                                  <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required autocomplete="category_id" autofocus>
                                      <option disabled selected>{{ __('Укажите рубрику') }}</option>
                                      @forelse($errors as $category)
                                          <option  @if ($category['category_id'] == old('category_id')) selected @endif value="{{ $category->title }}">{{ $category->title  }}</option>
                                      @empty
                                          <option >{{ __('Укажите рубрику') }}</option>
                                      @endforelse
                                  </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-sm-center">
                                <label for="isPrivate" class="col-md-4 col-form-label text-md-right">{{ __('Приватная новость') }}</label>
                                <input class='' @if (old('isPrivate')) checked @endif id="isPrivate" type="checkbox" class="form-control @error('isPrivate') is-invalid @enderror" name="isPrivate" value=true  autocomplete="isPrivate" autofocus>
                                <div class="col-md-8">
                                    @error('isPrivate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Добавить картинку') }}</label>
                                <input id="image" type="file" name="image">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if($news->id)
                                            {{ __('Обновить новость') }}
                                        @else
                                            {{ __('Добавить новость') }}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
