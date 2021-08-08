@extends('hrd/app')

@section('title', 'Approval Cuti')

@section('navbar')
  @parent
@endsection

@section('content')
<div class="card p-3">

  <!-- Title -->
  <div class="mb-3">
    <h1 class="display-4">Approval Cuti</h1>
  </div>

  <!-- Table -->
  <table class="table table-borderless table-hover text-nowrap" id="approval_table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
@endsection

@section('ajax')
  <script type="text/javascript" src="javascript/ajax/approval.js"></script>
@endsection
