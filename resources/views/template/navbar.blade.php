{{-- NAVBAR --}}


<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 nav_set">
  <div class="container">
    <a href="" class="navbar-brand">DASHBOARD+</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item px-2">
          <a href="#" class="nav-link">Data Kampanye</a>
        </li>
        <li class="nav-item px-2">
          <a href="{{ url('/pemilihan') }}" class="nav-link">Voting</a>
        </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
             <span class="caret">Data User</span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="{{ url('/dataPetugas') }}" class="dropdown-item">Data Petugas</a>
          <a href="{{ url('/masyarakat') }}" class="dropdown-item">Data Masyarakat</a>
          <a href="{{ url('/kandidat') }}" class="dropdown-item">Data Kandidat</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
             <span class="caret">Tentang</span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="{{ url('/tentang') }}" class="dropdown-item">Contact Us</a>
          <a href="{{ url('/masyarakat') }}" class="dropdown-item">About Us</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
             <span class="caret">Profil</span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profil Saya</a>
            <a class="dropdown-item" href="/logout">
              LOGOUT
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>