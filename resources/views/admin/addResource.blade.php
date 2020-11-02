@extends('layouts.app')
@if($resources->id)
    @section('title', 'Админка | Обновить ресурс')
@else
    @section('title', 'Админка | Добавить ресурс')
@endif

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  @if($resources->id)
                       <div class="card-header">{{ __('Обновление ресурса') }}</div>
                       @else
                        <div class="card-header">{{ __('Добавление нового ресурса') }}</div>
                        @endif
                       <div class="card-body">
                         <form method="POST"
                               action="@if ($resources->id){{  route('admin.resources.update', $resources) }} @else {{ route('admin.resources.store') }}@endif">
                             @csrf
                             @if($resources->id)
                                 @method('PUT')
                             @endif
                             <input hidden id="id" type="number" name="id" value="0">
                             <div class="form-group row">
                                 <label for="title"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                                 <div class="col-md-6">
                                     <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title') ?? $resources->title }}" required autocomplete="title"
                                            autofocus>

                                     @error('title')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label for="link"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ресурс') }}</label>

                                 <div class="col-md-6">
                                     <input id="link" type="text"
                                            class="form-control @error('link') is-invalid @enderror" name="link"
                                            value="{{ old('link') ?? $resources->link }}" required autocomplete="link"
                                            autofocus>

                                     @error('link')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                     <button type="submit" class="btn btn-primary">
                                         @if($resources->id)
                                             {{ __('Обновить ресурс') }}
                                         @else
                                             {{ __('Добавить ресурс') }}
                                         @endif
                                     </button>
                                 </div>
                             </div>
                         </form>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/ckeditor4/ckeditor.js"></script>
      <script>
          let options = {
              filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
              filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
              filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
              filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
          };
      </script>
      <script>
          CKEDITOR.replace('textEdit', options);
      </script>

@endsection
