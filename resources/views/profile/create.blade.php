@extends('layout.blank')

@section('content')
    <div class="container text-center">
        <h2 class="font-weight-light text-white">Hello, {!! $user->name !!}</h2>
        <p class="lead text-white-50">Please, add more details about yourself.</p>
    </div>
    <div class="align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 mx-auto">
                    <form action={{ route('profiles.store') }} method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" name="user_id" value={!! $user->id !!} readonly>

                        <div class="form-label-group">
                          <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required autocomplete="address" placeholder="Address" aria-describedby="helpId">
                          <label for="address">Address</label>
                          @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" aria-describedby="helpId">
                          <label for="phone">Phone Number</label>
                          @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <textarea name="ed_ex" id="ed_ex" class="form-control @error('ed_ex') is-invalid @enderror" value="{{ old('ed_ex') }}" required autocomplete="ed_ex" placeholder="Education and Experience" cols="54" rows="4"></textarea>
                          @error('ed_ex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" required autocomplete="photo" placeholder="Upload Photo" aria-describedby="helpId">
                          <label for="photo">Upload Photo</label>
                          @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror" value="{{ old('cv') }}" required autocomplete="cv" placeholder="Upload CV" aria-describedby="helpId">
                          <label for="cv">Upload CV</label>
                          @error('cv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="text-center">
                          <button type="submit" name="submit" class="btn btn-success btn-block">
                              Save
                          </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection