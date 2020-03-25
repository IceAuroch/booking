<aside id="app-aside" data-simplebar>
    <nav>
        <ul class="list-unstyled mb-0 mh-100 accordion">
            @foreach(app('nav')->backend() as $nav)
                <li id="submenu-heading-{{ $loop->iteration }}"
                    class="nav-item{{ app('router')->currentRouteNamed($nav->compare) ? ' is-active' : '' }}">
                    @isset($nav->unread)
                        <div class="unread">{{ $nav->unread }}</div>
                    @endisset

                    @if (empty((array)$nav->submenu))
                        <a href="{!! route($nav->route) !!}" class="d-flex align-items-center">
                            <i class="nav-icon {{ $nav->icon }} mr-3"></i>
                            {{ $nav->name }}
                        </a>
                    @else
                        <a data-toggle="collapse" href="#{{ str_slug($nav->name) }}" role="button" aria-expanded="false"
                           aria-controls="{{ str_slug($nav->name) }}" class="d-flex align-items-center">
                            <i class="nav-icon {{ $nav->icon }} mr-3"></i>
                            {{ $nav->name }}
                        </a>
                        <ul class="collapse list-unstyled submenu {{ app('router')->currentRouteNamed($nav->compare) ? 'show' : '' }}"
                            id="{{ str_slug($nav->name) }}">
                            @foreach($nav->submenu as $submenu)
                                <li class="submenu-item">
                                    <a href="{{ route($submenu['route']) }}">
                                        {{ $submenu['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
