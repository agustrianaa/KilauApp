<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  <title>Register</title>
</head>
<body>
  <div class="box">
    <span class="borderLine"></span>
    <form action="{{ route('register-proses') }}" method="post">
      @csrf
      <h2>Register</h2>

      <div class="inputBox">
        <input type="text" name="nama" value="{{ old('nama') }}" required="required">
        <span>Nama</span>
        <i></i>
      </div>
      @error('nama')
      <small>{{ $message }}</small>
      @enderror

      <div class="inputBox">
        <input type="email" name="email" value="{{ old('email') }}" required="required">
        <span>Email</span>
        <i></i>
      </div>
      @error('email')
      <small>{{ $message }}</small>
      @enderror

      <div class="inputBox">
        <input type="password" name="password" required="required">
        <span>Password</span>
        <i></i>
      </div>
      @error('password')
      <small>{{ $message }}</small>
      @enderror

      <div class="links">
        <p>Sudah mempunyai akun?</p>
        <a href="{{ route('login') }}">Login</a>
      </div>
      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>