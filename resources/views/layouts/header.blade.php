<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ __('Noteni') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'notes.add' ? 'active' : '' }}" href="{{ route('notes.add') }}">{{ __('New Note') }}</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'notes.index' ? 'active' : '' }}" href="{{ route('notes.index') }}">{{ __('All Notes') }}</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'links.add' ? 'active' : '' }}" href="{{ route('links.add') }}">{{ __('New Shortened URL') }}</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'features' ? 'active' : '' }}" href="{{ route('features') }}">{{ __('Features') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'about' ? 'active' : '' }}" href="{{ route('about') }}">{{ __('About') }}</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::currentRouteName() == 'login' ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::currentRouteName() == 'register' ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">{{ __('My Profile') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>