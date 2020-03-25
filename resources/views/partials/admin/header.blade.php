<header id="app-header">
    <ul class="d-flex align-items-center list-unstyled mb-0">
        <li>
            <a href="{{ route('app.home') }}" class="font-weight-bold" target="_blank">
                Перейти на сайт
            </a>
        </li>
        <li class="ml-auto">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Выйти
                <svg width="20" height="20" style="transform: scale(-1)">
                    <use xlink:href="#exit"></use>
                </svg>
            </a>
        </li>
    </ul>
</header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
