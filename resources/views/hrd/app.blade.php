<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css"/>

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <title>CutiKu - @yield('title')</title>
</head>
<body onload="date_time()">

  @section('navbar')
  <div class="fixed-top mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="form-inline mr-2">
        <div class="mr-3">
          <div class="rounded"><img class="img-thumbnail" width="50" src="images/logo.jpg"></div>
        </div>
        <div class="text-white">
          <strong>HR Staff</strong><br>
          <strong>HRD</strong>
        </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="btn btn-dark" href="/hrd">Absensi</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="/revisi">Revisi</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="/user">Cuti Saya</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="/approval_cuti_hrd">Approval Cuti</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="/approval_revisi_hrd">Approval Revisi</a>
          </li>
        </ul>
        <ul class="navbar-nav mr-0 ml-auto">
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
  @show

  <div class="container-fluid">
    @yield('content')
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- Google APIS jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- jQuery Cookie -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.js"></script>

  <!-- Sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- My JavaScript -->
  <script type="text/javascript" src="javascript/javascript.js"></script>

  <!-- AJAX -->
  @yield('ajax')
  <script type="text/javascript" src="javascript/ajax/user.js"></script>

</body>
</html>
