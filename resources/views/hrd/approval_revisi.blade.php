@extends('hrd/app')

@section('title', 'Approval Cuti')

@section('navbar')
  @parent
@endsection

@section('content')
<div class="card p-3">

  <!-- Form Title -->
  <div class="mb-3">
    <h1 class="display-4">Approval Revisi</h1>
  </div>

  <!-- Table -->
  <table class="table table-borderless table-hover text-nowrap" id="approval_revisi_table">
    <thead class="bg-secondary text-white">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Clock In</th>
        <th scope="col">Clock Out</th>
        <th scope="col">Date</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Approval 1</th>
        <th scope="col">Approval 2</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-light">
    </tbody>
  </table>
</div>
@endsection

@section('ajax')
  <script type="text/javascript" src="javascript/ajax/revisi.js"></script>
@endsection
