@extends('partial.login')
  @section('login')
    <form action="/register" method="post">
      @csrf
      <img class="mb-4" src="assets/img/logo.png" alt="" width="110" height="100">        <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>
      @if(session()->has('addSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('addSuccess') }}
        </div>
      @endif
      @if(session()->has('error'))
        <div class="alert alert-danger col-lg-13" role="alert">
          {{ session('error') }}
        </div>
      @endif
      <div class="form-floating">
        <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" placeholder="Name" required value = "{{ old('name') }}">
        @error('name')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingInput">Full Name</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control @error('username')is-invalid @enderror" id="username" name="username" placeholder="Username" required value = "{{ old('username') }}">
        @error('username')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email" placeholder="name@gmail.com" required value = "{{ old('email') }}">
        @error('email')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control @error('notelp')is-invalid @enderror" id="notelp" name="notelp" placeholder="0831xxxx" required value = "{{ old('notelp') }}">
        @error('notelp')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingInput">No Telepon</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control @error('address')is-invalid @enderror" id="address" name="address" placeholder="Address" required value = "{{ old('address') }}">
        @error('address')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingInput">Address</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control @error('pendidikan')is-invalid @enderror" id="pendidikan" name="pendidikan" placeholder="pendidikan" required value = "{{ old('pendidikan') }}">
        @error('pendidikan')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingInput">Education</label>
      </div>
      <div class="form-floating">
        <select class="form-select @error('usertype')is-invalid @enderror" aria-label="Default select example" name="usertype" required value = "{{ old('usertype') }}">
          <option selected>Sign Up As</option>
          <option value="Freshgraduate">Freshgraduate</option>
        </select>
        @error('usertype')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password"  class="form-control @error('password')is-invalid @enderror" id="password" name="password" placeholder="Password" required>
        @error('password')
          <div class= "invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg mt-2 mb-2" type="submit">Sign Up</button>
      <div class="mb-2">
        <label>
          I already have an account <a href="/signinmahasiswa"><span>Sign In</span></a>
        </label>
      </div>
      <p class="mt-3 mb-3 text-muted">&copy; 2022</p>
      </form>
  @endsection()
</html>