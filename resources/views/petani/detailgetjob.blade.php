@extends('partial.mainpetani')
  @section('main')
    <div class="card">
        {{-- <div class="row g-3" >
            <button class="badge bg-warning border-0 inline col-md-1"><span class="bi bi-pencil"></span> </button>
            <button class="badge bg-danger border-0 inline col-md-1"><span class="bi bi-trash"></span> </button>
        </div> --}}
        <div class="row g-3" >
            <div class="col-md-5 mt-5">
                <img src="{{ asset('storage/' . $job->foto) }}" class="img-fluid" alt="picture" style="margin-left: 3rem;">
            </div>
            <div class="col-md-5 mt-5" style="margin-left: 3rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $job->job_name }}</h5>
                    <p class="card-text text-muted" style="font-size: 11px;">Close: {{ $job->close }}</p>
                    <p class="card-text text-muted" style="font-size: 11px;">{{ $job->company }}</p>
                    <p class="card-text text-muted" style="font-size: 11px;">{{ $job->land }}</p>
                    <p class="card-text text-muted" style="font-size: 11px;"><i class="bi-geo-alt-fill" style="font-size: .7rem;"></i> {{ $job->location }}</p>
                    <p class="card-text text-muted" style="font-size: 11px;">Kontak: {{ $job->nohp }}</p>
                    <p class="card-text text-muted" style="font-size: 11px;">Email: {{ $job->email }}</p>
                </div>
            </div>
            <div class="mb-5" style="margin-left: 3rem;">
             {!! $job->body !!} 
            </div>
        </div>
    </div>
  @endsection()