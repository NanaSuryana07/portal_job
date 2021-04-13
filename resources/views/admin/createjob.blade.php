@extends('layout.admin')

@section('content')
    <div class="container text-center">
        <h2 class="font-weight-light text-blue">Add Job Vacancy</h2>
    </div>
    <div class="align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 mx-auto">
                    <form action="{{ route('admin.storejob') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-label-group">
                          <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" required autocomplete="position" placeholder="Position Name" aria-describedby="helpId">
                          <label for="position">Position Name</label>
                          @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                            <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" required autocomplete="company" placeholder="Company Name" aria-describedby="helpId">
                            <label for="company">Company Name</label>
                            @error('company')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>

                        <div class="form-label-group">
                          <input type="text" name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" required autocomplete="salary" placeholder="Salary" aria-describedby="helpId">
                          <label for="salary">Salary (Rp)</label>
                          @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required autocomplete="description" placeholder="Description" cols="54" rows="4"></textarea>
                          @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

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