@extends('partial.main')
  @section('main')
    <div class="mb-4" style="color: #61764B;">
      <h4>Jobs For You</h4>
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
                    <a href="/detailjob/{{ Str::slug($job->job_name) }}">See more</a>
                  </div>
                </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  @endsection()