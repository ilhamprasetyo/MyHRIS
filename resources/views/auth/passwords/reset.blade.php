<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Reset Password</title>
</head>
<body>
  <section id="reset-password" class="content">
    <div class="container-fluid">
      <div class="mb-3 p-1 text-center">
        <h1 class="display-4">Reset Password</h1>
      </div>
      <div class="mobile reset-password-form">
        <div class="card p-3">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</body>
</html>
