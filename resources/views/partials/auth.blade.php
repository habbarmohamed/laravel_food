<!-- Authentication Links -->
@guest
    <li class="nav-item">
        <a class="nav-link " href="{{ route('login') }}" style="border:1px solid gray">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"  aria-expanded="false" v-pre>
            {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
            <span class="vertical-top w-100 badge badge-warning rounded-circle px-2 text-uppercase" style="padding: 12px 0;">
                 {{-- {{substr(Auth::user()->name, 0 , 1)  }} --}}
                 <?php $parts = explode(" ", Auth::user()->name);           
                 $lastname = array_pop($parts);
                 $firstname = implode(" ", $parts);
                ?>
                {{substr($firstname, 0 , 1)  }}{{substr($lastname, 0 , 1)  }}
                </span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('home') }}">My Commands</a>

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest