<div>
    <nav id="navmenu" class="navmenu">
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
            </li>
            <li>
                <a href="{{ route('service') }}" class="{{ Request::is('service') ? 'active' : '' }}">Services</a>
            </li>
            <li>
                <a href="{{ route('history') }}" class="{{ Request::is('history') ? 'active' : '' }}">History</a>
            </li>
            <li>
                <a href="{{ route('structure') }}" class="{{ Request::is('structure') ? 'active' : '' }}">Structure</a>
            </li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
</div>
