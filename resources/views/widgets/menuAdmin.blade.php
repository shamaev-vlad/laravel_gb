<li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.index') }}">{{ __('Новости') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.news.create')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.create') }}">{{ __('Добавить новость') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.category.create')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.category.create') }}">{{ __('Добавить рубрику') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.download.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.download.index') }}">{{ __('Загрузить') }}</a>
</li>
