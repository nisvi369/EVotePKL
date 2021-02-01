{{-- NAVBAR --}}


<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 nav_set">
  <div class="container">
    <a href="" class="navbar-brand">DASHBOARD+</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        @if(auth()->user()->level == 'admin')
        <li class="nav-item px-2">
          <a href="{{ url('/Admin/dataPetugas') }}" class="nav-link">Data Petugas</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('/Admin/dataMasyarakat') }}" class="nav-link">Data Masyarakat</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('Admin/dataKandidat') }}" class="nav-link">Data Kandidat</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('Admin/dataKampanye') }}" class="nav-link">Data Kampanye</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('Admin/jadwalPemilihan') }}" class="nav-link">Jadwal Pemilihan</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('/Admin/pemilihan') }}" class="nav-link">Voting</a>
        </li>
        @endif

        @if(auth()->user()->level == 'petugas')
        <li class="nav-item px-2">
          <a href="{{ url('Petugas/dataMasyarakat') }}" class="nav-link">Data Masyarakat</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('/periode') }}" class="nav-link">Periode</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('Petugas/dataKampanye') }}" class="nav-link">Data Kampanye</a>
        </li>
        @endif

        @if(auth()->user()->level == 'pemilih')
        <li class="nav-item px-2">
          <a href="{{ url('/Masyarakat/pemilihan') }}" class="nav-link">Voting</a>
        </li>
        @endif
        @if(auth()->user()->level == 'kandidat')
        <li class="nav-item px-2">
          <a href="{{ url('/Kandidat/dataKampanye') }}" class="nav-link">Data Kampanye</a>
        </li>
        
        @endif
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
             <span class="caret"></span>
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