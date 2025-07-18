<!-- master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  @include('auth.authlayout.head') <!-- Memasukkan bagian head -->
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="{{ asset('assets/awh/logo.jpeg') }}" alt="logo" style="width: 50%; background-color:green;margin-left:25%;margin-right:25%" class="flex justify-content-center mb-5 mt-2">
            <h4 class="text-dark font-weight-normal text-center">Welcome to <span class="font-weight-bold">Pencatatan Arsip</span></h4>
            <p class="text-muted text-center"></p>
            @yield('content')
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('assets/img/unsplash/login-bg.jpg') }}">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  @include('auth.authlayout.footer') <!-- Memasukkan bagian footer -->
</body>

</html>
