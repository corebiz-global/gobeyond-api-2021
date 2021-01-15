@if(Route::has($routeName))
<li class="nav-item{{ $isCurrentRoute() ? ' active' : '' }}">
    <a class="nav-link" href="{{ $isCurrentRoute() ? '#' : route($routeName) }}">
        {{ $label }}
    </a>
</li>
@endif
