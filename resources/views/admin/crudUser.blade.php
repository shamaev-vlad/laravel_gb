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
                                  <div style="display: flex; margin-bottom: 10px;">
                                  @if ($user->is_admin)
                            <a href="{{route('admin.toggleAdmin', $user)}}"><button type="button" class="btn btn-danger">Поменять статус</button></a>
                            @else
                            <a href="{{route('admin.toggleAdmin', $user)}}"> <button type="button" class="btn btn-success">Поменять статус</button></a>
                            @endif


                                    <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger" style="margin-left: 25px;">
                                          {{ __('Удалить') }}
                                        </button>
                                    </form>
                                  </div>

                                </div>
                            @empty
                                {{ __('Список пользователей пуст!') }}
                            @endforelse
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
