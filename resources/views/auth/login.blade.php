<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
  <style>
    .section.register.min-vh-100.d-flex.flex-column.align-items-center.justify-content-center.py-4 {
      /* background-color: aqua; */
      background: linear-gradient(to top right, yellow, rgb(0, 97, 224));
    }
    .d-flex.justify-content-center.py-4 {
      background: transparent;
    }
  </style>
  <link href="../images/LogoKilau.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body>

  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container asd">
      <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

      <div class="d-flex justify-content-center py-4">
              <img src="../images/LogoKilau.png" alt="Logo" width="115" height="100" class="d-inline-block align-text-top" >
      </div>

          <div class="card mb-3">
            <div class="card-header">
              <h5 class="card-title text-center pb-0 fs-4">LOGIN</h5>
            </div>
            <div class="card-body">
            <form class="row g-3 needs-validation" action="{{ route('login-proses') }}" method="post">
              @csrf
              <div class="col-12">
                  <label for="email" class="form-label">Email Address</label>
                      <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" id="email">
                          <div class="invalid-feedback">Please enter your username.</div>
                      </div>
              </div>
              @error('email')
              <small>{{ $message }}</small>
              @enderror
              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
              
                <div class="invalid-feedback">Please enter your password!</div>
              </div>
              @error('password')
              <small>{{ $message }}</small>
              @enderror
              <div class="col-12">
                <input class="btn btn-primary w-100" type="submit" value="Login" id="tombollogin">
              </div>
            <div class="col-15">
              <a href="#"> Belum Punya Akun?</a>
              <a href="{{ route('register') }}">Register</a>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js" integrity="sha512-/6TZODGjYL7M8qb7P6SflJB/nTGE79ed1RfJk3dfm/Ib6JwCT4+tOfrrseEHhxkIhwG8jCl+io6eaiWLS/UX1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  let scene = document.getElementById('scene');
  let parallax = new Parallax(scene);
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
<script>
  Swal.fire('{{ $message }}')
</script>
@endif

@if ($message = Session::get('failed'))
<script>
  Swal.fire('{{ $message }}')
</script>
@endif

</body>
</html>
