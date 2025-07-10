<!-- login.blade.php -->
@extends('auth.authlayout.master')
@section('content')
<!-- Login Form -->
<form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
  @csrf
  <div class="form-group">
    <label for="username">Username</label>
    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
    @error('username')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <div class="d-block">
      <label for="password" class="control-label">Password</label>
    </div>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
    @error('password')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <div class="custom-control custom-checkbox">
      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
      <label class="custom-control-label" for="remember-me">Remember Me</label>
    </div>
  </div>

  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
      Login
    </button>
  </div>
</form>
<!-- End Login Form -->
@endsection
