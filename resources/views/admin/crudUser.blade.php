@extends('layouts.app')

@section('title', 'Редактирование профилей')

@section('menu')
    @include('widgets.menuAdmin')
@endsection

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Профили пользователей для редактирования')  }}</div>
                        <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          @forelse($users as $user)
                              <div data-id="{{$user->id}}">

                                  <h3>
                                      {{ __($user->name) }}
                                  </h3>
                                  <p>
                                      @if ($user->is_admin)
                                          {{ __('Статус: admin') }}
                                      @else
                                          {{ __('Статус: user') }}
                                      @endif
                                  </p>
                                  <div class="col-md-8">
                                    @if ($user->is_admin)
                                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-danger">Снять админа</a>
                                    @else
                                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Назначить админом</a>
                                    @endif
                                  </div>
                                  <p>
                                    <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                      @csrf
                                      @method('DELETE')
                                      <a class="btn btn-success" href="{{ route('admin.user.edit', $user) }}">Редактировать</a>
                                      <button type="submit" class="btn btn-danger">
                                          {{ __('Удалить') }}
                                        </button>
                                    </form>
                                    </p>
                                </div>
                            @empty
                                {{ __('Список пользователей пуст!') }}
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
