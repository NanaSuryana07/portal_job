@extends('layout.admin')

@section('content')
    <div class="container text-center">
        <h2 class="font-weight-light text-blue">Edit Job Vacancy</h2>
    </div>
    <div class="align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 mx-auto">
                        <form action="{{ route('admin.updatejob', $job->id) }}" method="POST" enctype="multipart/form-data">
                         {{csrf_field()}} {{method_field('PUT')}}

                        <div class="form-label-group">
                          <input type="text" name="position" id="position" value="{!! $job->position !!}" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" required autocomplete="position" placeholder="Position Name" aria-describedby="helpId">
                          <label for="position">Position Name</label>
                          @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                            <input type="text" name="company" id="company" value="{!! $job->company !!}" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" required autocomplete="company" placeholder="Company Name" aria-describedby="helpId">
                            <label for="company">Company Name</label>
                            @error('company')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>

                        <div class="form-label-group">
                          <input type="text" name="salary" id="salary" value="{!! $job->salary !!}" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" required autocomplete="salary" placeholder="Salary" aria-describedby="helpId">
                          <label for="salary">Salary (Rp)</label>
                          @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required autocomplete="description" placeholder="Description" cols="54" rows="4">{!! $job->description !!}</textarea>
                          @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        @if ($job->image=='image/')
                            
                        @else
                            <p class="text-white-50 text-center">
                                <img src={{asset($job->image)}} alt="" style="width:40%;height:40%">
                            </p>
                        @endif
                        <div class="form-label-group">
                          <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}" autocomplete="image" placeholder="Image" aria-describedby="helpId">
                          <label for="image">Image</label>
                        </div>

                        <div class="text-center">
                          <button type="button" name="cancel" onclick="window.location.href='{{ route('admin.listjob') }}';" class="btn btn-secondary col-md-3">
                              Cancel
                          </button>
                          <button type="submit" name="submit" class="btn btn-success col-md-3">
                              Save
                          </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection