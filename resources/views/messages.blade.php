@if ($message = Session::get('primary'))
<div class="alert alert-primary" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('secondary'))
<div class="alert alert-secondary" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('light'))
<div class="alert alert-light" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('dark'))
<div class="alert alert-dark" role="alert">
  <strong>{{ $message }}</strong>
</div>
@endif
