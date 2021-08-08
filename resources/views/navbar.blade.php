<div class="fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="form-inline">
      <div class="mr-3">
        <div class="rounded"><img class="img-thumbnail" width="50" src="images/logo.jpg"></div>
      </div>
      <div class="text-white">
        <strong id="jabatan_user"></strong><br>
        <strong id="unit_user"></strong>
      </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="show">
      <ul class="navbar-nav mr-0 ml-auto">
        <li class="nav-item">
        <a class="btn btn-dark" href="/absensi">Absensi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" href="/revisi">Revisi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" href="/user">Cuti Saya</a>
        </li>
      </ul>
      <ul class="navbar-nav" id="koordinator_menu">
        <li class="nav-item">
          <a class="btn btn-dark" href="/approval_revisi">Approval Revisi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" href="/approval">Approval Cuti</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark" href="/karyawan">Karyawan</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <div class="my-auto">
          <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b id="nama_user"></b></button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="/profile">Profile</a>
            <button class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">
              {{ __('Logout') }}
            </button>
            <form id="logout" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </div>
        </div>
      </ul>
    </div>
  </nav>
  <div class="relative" align="center" id="messages">
    @include('messages')
  </div>
</div>
