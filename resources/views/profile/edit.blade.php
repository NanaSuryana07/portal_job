@extends('layout.blank')

@section('content')
    <div class="container text-center">
        <h2 class="font-weight-light text-white">Edit Profile</h2>
        <p class="lead text-white-50">Update details about yourself.</p>
    </div>
    <div class="align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 mx-auto">
                    <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}} {{method_field('PUT')}}

                        <div class="form-label-group">
                            <input id="name" type="text" value="{!! $user->name !!}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">{{ __('Full Name') }}</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        
                        <div class="form-label-group">
                          <input type="date" name="birth_date" id="birth_date" value="{!! $user->birth_date !!}" class="form-control @error('birth_date') is-invalid @enderror" placeholder="Date of Birth" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
                          <label for="birth_date">Date of Birth</label>
                          @error('birth_date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
        
                        <div class="form-label-group">
                            <input id="email" type="email" value="{!! $user->email !!}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">{{ __('Email Address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-label-group">
                          <input type="text" name="address" id="address" value="{!! $profile->address !!}" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required autocomplete="address" placeholder="Address" aria-describedby="helpId">
                          <label for="address">Address</label>
                          @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <input type="text" name="phone" id="phone" value="{!! $profile->phone !!}" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" aria-describedby="helpId">
                          <label for="phone">Phone Number</label>
                          @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-label-group">
                          <textarea name="ed_ex" id="ed_ex" class="form-control @error('ed_ex') is-invalid @enderror" value="{{ old('ed_ex') }}" required autocomplete="ed_ex" placeholder="Education and Experience" cols="54" rows="4">{!! $profile->ed_ex !!}</textarea>
                          @error('ed_ex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <p class="text-white-50 text-center">
                            <img src={{asset($profile->photo)}} alt="" style="width:40%;height:40%">
                        </p>
                        <div class="form-label-group">
                          <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" value="{!! $profile->photo !!}" autocomplete="photo" placeholder="Upload Photo" aria-describedby="helpId">
                          <label for="photo">Upload New Photo</label>
                          @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <p class="text-white-50">{!! $profile->cv !!}</p>
                        <div class="form-label-group">
                          <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror" value="{!! $profile->cv !!}" autocomplete="cv" placeholder="Upload CV" aria-describedby="helpId">
                          <label for="cv">Upload New CV</label>
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