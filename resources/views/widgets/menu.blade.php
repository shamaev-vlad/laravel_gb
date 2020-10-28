<!-- <div class="links">
  <a href="?=route('home')?>">Главная</a>
  <a href="?=route('news.news')?>">Новости</a>
  <a href="?=route('about')?>">О нас</a>
  <a href="?=route('admin.index')?>">Войти как администратор</a>
   </div>
  <br> -->
  <li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.index') }}">{{ __('Новости') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('news.category.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.category.index') }}">{{ __('Рубрики') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('about')?'active':'' }}">
  <a class="nav-link" href="{{ route('about') }}">{{ __('О нас') }}</a>
</li>
