@extends('partial.main')
  @section('main')
  <div class="mb-4" style="color: #61764B;">
      <h4>Welcome, {{ auth()->user()->username }}</h4>
  </div>

  <div class="cards">
          <div class="card-single">
            <div>
              <h4>{{ $land }} ha</h4>
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
                <h4>{{ Count($users) }}</h4>
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
        <div class="recent-grid">
          <div class="projects">
            <div class="card">
              <div class="card-header">
                <h4>Recent jobs</h4>
                <a href="/getjob"><button>See all <span class="bi-arrow-right">
                </span></button></a>
              </div>
              <div class="card-body">
                <table class="responsive">
                  <table width="100%">
                    <thead>
                      <tr>
                        <td>Land</td>
                        <td>Job Position Offered</td>
                        <td>Company</td>
                        <td>Location</td>
                      </tr>
                    </thead>
                    @if (isset($jobs))
                      @foreach ($jobs as $job)
                        <tbody>
                          <tr>
                            <td>{{ $job->job_name }}</td>
                            <td>{{ $job->position }}</td>
                            <td>{{ $job->company }}</td>
                            <td>{{ $job->location }}</td>
                          </tr>
                        </tbody>
                      @endforeach
                    @endif
                  </table>
                </table>
              </div>
            </div>
          </div>
        </div>
  @endsection()