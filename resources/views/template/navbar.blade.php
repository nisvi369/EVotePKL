{{-- NAVBAR --}}


<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 nav_set">
  <div class="container">
    @if(auth()->user()->level == 'admin')
    <a href="{{ url('/Admin/home') }}" class="navbar-brand">DASHBOARD</a>
    @elseif(auth()->user()->level == 'petugas')
    <a href="{{ url('/Petugas/home') }}" class="navbar-brand">DASHBOARD</a>
    @elseif(auth()->user()->level == 'pemilih')
    <a href="{{ url('/Masyarakat/home') }}" class="navbar-brand">DASHBOARD</a>
    @elseif(auth()->user()->level == 'kandidat')
    <a href="{{ url('/Masyarakat/home') }}" class="navbar-brand">DASHBOARD</a>
    @endif
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        @if(auth()->user()->level == 'admin')
        <li class="nav-item px-2">
          <a href="/dataPetugas" class="nav-link">Data Petugas</a>
        </li>
        @endif

        @if(auth()->user()->level == 'petugas')
        <li class="nav-item px-2">
          <a href="{{ url('/masyarakat') }}" class="nav-link">Data Masyarakat</a>
        </li>
        @endif
        
        @if(auth()->user()->level == 'admin')
        <li class="nav-item px-2">
          <a href="{{ url('/kandidat') }}" class="nav-link">Data Kandidat</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('/periode') }}" class="nav-link">Periode</a>
        </li>
        @endif

        @if(auth()->user()->level == 'pemilih')
        <li class="nav-item px-2">
          <a href="{{ url('/pemilihan') }}" class="nav-link">Voting</a>
        </li>
        @endif

        @if(auth()->user()->level == 'kandidat')
        <li class="nav-item px-2">
          <a href="{{ url('/pemilihan') }}" class="nav-link">Voting</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('/kandidat/dataKampanye') }}" class="nav-link">Data Kampanye</a>
        </li>
        @endif

      </ul>
      <ul class="navbar-nav ml-auto">
          @if(Str::length(Auth::guard('masyarakat')->user()) > 0)
          <b>{{ Auth::guard('masyarakat')->user()->nama }}</b>
          @elseif(Str::length(Auth::guard('user')->user()) > 0)
          <b>{{ Auth::guard('user')->user()->name }}</b>
          @elseif(Str::length(Auth::guard('user')->user()) > 0)
          <b>{{ Auth::guard('petugas')->user()->name }}</b>
          @endif
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
             <span class="caret">Profil</span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if(auth()->user()->level == 'admin')
            <a class="dropdown-item" href="{{ url('/profil-admin') }}">Profil Saya</a>
            @elseif(auth()->user()->level == 'pemilih')
            <a class="dropdown-item" href="{{ url('/profil') }}">Profil Saya</a>
            @elseif(auth()->user()->level == 'kandidat')
            <a class="dropdown-item" href="{{ url('/profil') }}">Profil Saya</a>
            @elseif(auth()->user()->level == 'petugas')
            <a class="dropdown-item" href="{{ url('/profil-petugas') }}">Profil Saya</a>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}">
              LOGOUT
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>