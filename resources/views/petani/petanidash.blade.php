@extends('partial.mainpetani')
  @section('main')
  <div class="mb-4" style="color: #61764B;">
      <h4>Welcome, {{ session("userLogined")["nama"] }}</h4>
  </div>

  <div class="cards">
          <div class="card-single">
            <div>
              <h4>{{$land}} ha</h4>
              <span>Jumlah Lahan Terdaftar</span>
            </div>
            <div>
              <span class="bi-tree"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
              <h4>{{ Count($jobs) }}</h4>
              <span>Project Tersedia</span>
            </div>
            <div>
              <span class="bi-journal-check"></span>
            </div>
          </div>
          <div class="card-single">
              <div>
                <h4>{{ Count($users_mhs) }}</h4>
                <span>Freshgraduate yang telah tergabung</span>
              </div>
              <div>
                <span class="bi-bag-check"></span>
              </div>
          </div>
          <div class="card-single">
              <div>
                <h4>{{ Count($jobs) }}</h4>
                <span>Pekerjaan Terdaftar</span>
              </div>
              <div>
                <span class="bi-person-lines-fill"></span>
              </div>
          </div>
        </div>

        <div class="mb-4 mt-4" style="color: #61764B;">
          <h4>My Land Post</h4>
        </div>
        
        <div class="row">
          @if (isset($jobs))
            @foreach ($jobs as $job)
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="wrapper mt-0.5">
                      <img src='{{ asset("storage/".$job->foto) }}' width="100px" height="100px" alt="picture">
                      <div class="mt-3">
                        <h6>{{ $job->job_name }}</h6>
                        <p>{{ $job->company }}</p>
                        <p><i class="bi-geo-alt-fill" style="font-size: 1rem;"></i>{{ $job->location }}</p>
                        <a href="/detail/{{ Str::slug($job->job_name) }}">See more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
  @endsection()