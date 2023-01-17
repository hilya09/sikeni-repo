@extends('partial.main')
    @section('main')
        <div class="row">
            @if (session('statusError'))
                <div class="alert alert-danger">
                    {{ session('statusError') }}
                </div>
            @endif
            @if (session('statusSuccess'))
                <div class="alert alert-success">
                    {{ session('statusSuccess') }}
                </div>
            @endif
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
                                <button class="nav-link active" data-bs-toggle="tab" style="color:#9BA17B; font-weight: 500;">Edit Password</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content pt-2 mt-3">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <form action="/editpassmhs" method="post" class="mt-2">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="password_lama" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Lama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama">
                                            
                                            @error('password_lama')
                                            <div class= "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newpassword">
                                            
                                            @error('newpassword')
                                            <div class= "invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newpassword_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Kata Sandi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword_confirmation" type="password" class="form-control @error('newpassword_confirmation') is-invalid @enderror" id="newpassword_confirmation">
                                            
                                            @error('newpassword_confirmation')
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