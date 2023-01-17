@extends('partial.login')
  @section('login')
    @if(session()->has('addSuccess'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('addSuccess') }}
          </div>
    @endif
    <form action="/signinpetani" method="post">
      @csrf
      <img class="mb-4" src="assets/img/logo.png" alt="" width="110" height="100">
      <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
      @if(session()->has('LoginError'))
        <div class="alert alert-danger col-lg-13" role="alert">
          {{ session('error') }}
        </div>
      @endif
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old ('email')}}">
        <label for="floatingInput">Email address</label>         
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" >
        <label for="floatingPassword">Password</label>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button class="w-100 btn btn-lg mt-2 mb-2" type="submit">Sign in</button>
        <div class="mb-2">
          <label>
            Haven't an account? <a href="/registerpetani"><span>Sign Up</span></a>
          </label>
        </div>
        <p class="mt-3 mb-3 text-muted">&copy; 2022</p>
    </form>
  @endsection()
</html>