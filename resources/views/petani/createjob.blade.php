@extends('partial.mainpetani')
    @section('main')
    <div class="card">
        <div class="card-body mt-4">
            <h5 class="card-title">Create Job</h5>
            @if(session()->has('addSuccess'))
                <div class="alert alert-success col-lg-13" role="alert">
                    {{ session('addSuccess') }}
                </div>
            @endif
                <!-- General Form Elements -->
            <form action ="{{ isset($url)? $url : "/createjob"  }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 mt-4">
                    <label for="job_name" class="form-label">Job</label>
                    <div class="col-sm-10">
                        <input type="text" name="job_name" class="form-control @error('job_name') is-invalid @enderror" id = "job_name" autofocus required value="{{ isset($job_detail)? $job_detail->job_name : old('job_name') }}">
                        @error('job_name')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="company" class="form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id = "company" autofocus required value="{{ isset($job_detail)? $job_detail->company : old('company') }}">
                        @error('company')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="location" class="form-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id = "location" autofocus required value="{{ isset($job_detail)? $job_detail->location : old('location') }}">
                        @error('location')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="land" class="form-label">Land</label>
                    <div class="col-sm-10">
                        <input type="text" name="land" class="form-control @error('land') is-invalid @enderror" id = "land" autofocus required value="{{ isset($job_detail)? $job_detail->land : old('land') }}">
                        @error('land')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="position" class="form-label">Job Positions Offered</label>
                    <div class="col-sm-10">
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id = "position" autofocus required value="{{ isset($job_detail)? $job_detail->position : old('position') }}">
                        @error('position')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id = "email" autofocus required value="{{ isset($job_detail)? $job_detail->email : old('email') }}">
                        @error('email')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" id = "nohp" autofocus required value="{{ isset($job_detail)? $job_detail->nohp : old('nohp') }}">
                        @error('nohp')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="close" class="form-label">Close</label>
                    <div class="col-sm-10">
                        <input type="date" name="close" class="form-control @error('close') is-invalid @enderror" id = "close" required value="{{ isset($job_detail)? $job_detail->close : old('close') }}">
                        @error('close')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                    
                <div class="row mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ isset($job_detail)?asset("storage/".$job_detail->foto):" " }}">
                    <div class="col-sm-10">
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id = "foto"
                        name="foto" value="{{  isset($job_detail)?asset("storage/".$job_detail->foto):" " }}" onchange="previewImage()">
                        @error('foto')
                            <div class= "invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                    
                <div class="row mb-3">
                    <div class="card-body">
                        <label for="body" class="form-label">Job Description</label>
                        <div id="emailHelp" class="form-text">contains qualifications, salary, and requitment information</div>
                            @error('body')
                              <p class= "text-danger">{{ $message }}</p> 
                            @enderror
                            <input id="body" type="hidden" name="body" class="form-control @error('body') is-invalid @enderror">
                            <trix-editor input="body">{!! isset($job_detail)? $job_detail->body : "" !!}</trix-editor>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn" style="background-color: #61764B; color: #fff;">Create</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{  session("userLogined")["id_user"] }}">
            </form><!-- End General Form Elements -->
        </div>
    </div>

    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h4>My Land Post</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripe table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Land</th>
                                    <th scope="col">Job Position Offered</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Aksi</th>
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
                                            <td>
                                            <a href="/detail/{{ Str::slug($job->job_name)}}" class="badge bg-primary"><span class="bi bi-eye-fill"></span></a>
                                            <a href="/editpost/{{ Str::slug($job->job_name)}}" class="badge bg-warning"><span class="bi bi-pencil-square"></span></a>
                                            <form action="/deletepost" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id_job_delete" value="{{ $job->id }}">
                                                <button class="badge bg-danger border-0" onclick ="return confirm ('Yakin Anda Ingin Menghapus?')"><span class="bi bi-trash"></span> </button>
                                            </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @endif
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(){
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display ='block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
    @endsection()