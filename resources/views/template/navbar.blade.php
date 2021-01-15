{{-- NAVBAR --}}

<?php $user = Auth::user(); ?>

<nav class="navbar navbar-expand-sm navbar-light bg-light p-0 nav_set">
  <div class="container">
    <a href="/home" class="navbar-brand">DASHBOARD+</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        @if (Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && Auth::user()->status_akun ==
        'Terverifikasi')
        <li class="nav-item px-2">
          <a href="/" class="nav-link">apa ini</a>
        </li>
        @endif
        @if (Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && Auth::user()->status_akun ==
        'Terverifikasi')
        <li class="nav-item px-2">
          <a href="/daftar_penyakit" class="nav-link">Pemilihan</a>
        </li>
        @endif
        @if (Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && Auth::user()->status_akun ==
        'Terverifikasi')
        <li class="nav-item px-2">
          <a href="#" class="nav-link">Kampanye</a>
        </li>
        @endif
        @if (Auth::check() && Auth::user()->role_id == 1)
        <li class="nav-item px-2">
          <a href="/user" class="nav-link">Profil</a>
        </li>
        @endif
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('lOGIN'))

        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->nama }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->status_akun == 'Terverifikasi')
            <a class="dropdown-item" href="{{ route('home.profil_saya', $user->id) }}">Profil Saya</a>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>