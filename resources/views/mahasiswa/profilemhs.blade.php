@extends('partial.main')
  @section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 label ">Username</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->username }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 label">No Telepon</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->notelp }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->address }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 label">Pendidikan</div>
                                <div class="col-lg-9 col-md-8">{{ auth()->user()->pendidikan }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection()