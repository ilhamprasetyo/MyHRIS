<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Lupa Password</title>
</head>
<body>

  @if (session('status'))
  <div class="fixed-top" align="center">
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  </div>
  @endif

  @error('email')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror

  <section class="content">
    <div class="reset_password container">
      <div class="mb-3 p-1 text-center">
        <h1 class="display-4">Reset Password</h1>
      </div>
      <div class="card p-3">
        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="form-group">
            <label for="email">Your email :</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          </div>
          <button type="submit" class="btn btn-primary">Send Link</button>
          <button type="reset" class="btn btn-primary">Reset</button>
          <a href="/" class="btn btn-dark">Kembali</a>
        </form>
      </div>
    </div>

  </div>
</section>
</body>
</html>
