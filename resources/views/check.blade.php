<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Check</title>
</head>
<body>
  <div class="fixed-top" align="center">
    @include('messages')
  </div>
  <section id="form-check" class="content">
    <div class="container-fluid">
      <div class="mb-3 p-1 text-center">
        <h1 class="display-4">Cek ID Pegawai</h1>
      </div>
      <div class="check mobile">
        <div class="card p-3">
          <form action="/request" method="get">
            <div class="form-group">
              <label>Check your ID</label>
              <input type="number" class="form-control" name="check" length="10" placeholder="ID pegawai" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <a href="/" class="btn btn-dark">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- JavaScript CDN and Custom JavaScript -->
  @include('javascript')
</body>
</html>
