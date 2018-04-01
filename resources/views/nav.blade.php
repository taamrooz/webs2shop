@extends('index')

@section('nav')

    <header>
        <nav class="navbar row" id="navbar">
            <ul>
                <li id="escapeHatch">
                    <a href="/">
                        <img src="{{ asset('img/sigil.svg') }}" alt="Home">
                        <span><b>Ackerwildkrauter</b></span>
                    </a>
                </li>
                {{--@foreach($menuItems as $menuItem)
                    @if($menuItem->user_level >= 1)
                        @if(Auth::user() !== null)
                            @if(Auth::user()->isAdmin())
                                <li class="{{ Request::is('admin') || Request::is('admin/*') ? 'active' : '' }}"><a href="/admin">Admin</a></li>
                            @endif
                        @endif
                    @else
                        <li class="{{ Request::is('producten') || Request::is('producten/*') ? 'active' : '' }}"><a href="/producten">Producten</a></li>
                    @endif
                @endforeach--}}
                <li class="{{ Request::is('producten') || Request::is('producten/*') ? 'active' : '' }}"><a href="/producten">Producten</a></li>
                <li class="{{ Request::is('winkelwagen') || Request::is('winkelwagen/*') ? 'active' : '' }}"><a href="/winkelwagen">Winkelwagen</a></li>
                @if(Auth::user() !== null)
                    @if(Auth::user()->isAdmin())
                        <li class="{{ Request::is('admin') || Request::is('admin/*') ? 'active' : '' }}"><a href="/admin">Admin</a></li>
                    @endif
                @endif
                @guest
                    <li class="{{ Request::is('inloggen') ? 'active' : '' }}"><a href="/inloggen">Inloggen</a></li>
                    <li><a href="/registreren">Registreren</a></li>
                @else
                    <li class="{{ Request::is('account') || Request::is('account/*') ? 'active' : '' }}"><a href="/account">{{ Auth::user()->name }}</a></li>
                    <li><a href="/uitloggen">Uitloggen</a></li>
                @endguest
            </ul>
        </nav>
    </header>

@endsection