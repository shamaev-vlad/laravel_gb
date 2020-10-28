@extends('layouts.admin')

@section('title')
    @parent Admin
@endsection

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card">
            <div class="card-header">{{ __('Разобранные новости') }}</div>



            <div class="card-body">
            <section class="categories">
                    <div class="container" style="">
                      <a href="{{ route('admin.parserNews') }}">
                          <button style="margin-bottom: 25px;" type="button" class="btn btn-success">Получить новости</button>
                      </a>
                        <h1>Категории</h1>
                        <div class="row">
                            @forelse($categories as $category)
                                <div style="display: flex; width: 100%">
                                    <h2><a
                                            href="{{ route('news.category.show', $category['slug']) }}"
                                            style="color:mediumseagreen;"
                                        >
                                            {{ $category->category }}
                                        </a></h2>
                                </div>
                            @empty
                                <h2 style="padding: 20px; margin-left: 50px">No category</h2>
                            @endforelse
                        </div>
                    </div>

            </section>
          </div>
          </div>
          </div>
        </div>
      </div>
@endsection
