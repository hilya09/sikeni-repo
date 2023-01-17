@extends('partial.main')
  @section('main')
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-13" role="alert">
        {{ session('success') }}
        </div>
    @endif

    @if(session()->has('updateprofilfail'))
        <div class="alert alert-danger col-lg-13" role="alert">
        {{ session('updateprofilfail') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="/assets/img/profile.png" alt="Profile" class="rounded-circle mb-2">
                    <h6>{{ auth()->user()->name }}</h6>
                    <p>{{ auth()->user()->usertype }}</p>
                </div>
            </div>
        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" style="color:#9BA17B; font-weight: 500;">Biodata</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content pt-2 mt-3">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <form action="/updateprofilmhs/{{ Auth::user()->id }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ auth()->user()->username }}">
                                        
                                        @error('username')
                                        <div class= "invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="namalengkap" required value="{{ auth()->user()->name }}">
                                        
                                        @error('name')
                                        <div class= "invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ auth()->user()->email }}">
                                        
                                        @error('email')
                                        <div class= "invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="notelp" class="col-md-4 col-lg-3 col-form-label">No Telepon</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="notelp" type="text" class="form-control @error('notelp') is-invalid @enderror" id="notelp" required value="{{ auth()->user()->notelp }}">
                                        
                                        @error('notelp')
                                        <div class= "invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-lg-3 col-form-label">address</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" required value="{{ auth()->user()->address }}">
                                        
                                        @error('address')
                                        <div class= "invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pendidikan" class="col-md-4 col-lg-3 col-form-label">Pendidikan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="pendidikan" type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" required value="{{ auth()->user()->pendidikan }}">
                                        @error('pendidikan')
                                        <div class= "invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn" style="background-color: #61764B; color: #fff;">Simpan</button>
                                </div>
                            </form>          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection()