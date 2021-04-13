@extends('layout.master')
@section('main')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Looking For A Job?</h2>
            <p class="lead">We are here to help you</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Apply Now</h2>
            <p class="lead">Apply for jobs that match your skills and interests</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Register now. It's free.</h2>
            <p class="lead">
                @if (Route::has('register'))
                <button class="btn btn-lg btn-light col-md-2" style="color:dodgerblue" onclick="window.location.href='{{ route('register') }}';">Register</button>
                @endif
                <button class="btn btn-lg btn-success col-md-2" onclick="window.location.href='{{ route('user.listjob') }}';">See Job List</button>
            </p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
  </header>
  
  <!-- Page Content -->
  <section class="py-5">
    <div class="container text-center">
      <p class="lead text-white-50">This web application is made in order to fulfill the final project on GeeksFarm Laravel Training 2019</p>
    </div>
  </section>

  <style>
      .carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
  </style>

    {{-- <div class="container text-center">
        <h1 class="font-weight-light mt-4 text-white">Looking for a job? We are here to help you</h1>
        <h2 class="font-weight-light text-white-50">Apply for jobs that match your skills and interests</h2>
        <p class="lead text-white-50">Register now. It's free.</p>
        @if (Route::has('register'))
        <button class="btn btn-lg btn-light col-md-2" style="color:dodgerblue" onclick="window.location.href='{{ route('register') }}';">Register</button>
        @endif
        <button class="btn btn-lg btn-success col-md-2" onclick="window.location.href='{{ route('user.listjob') }}';">See Job List</button>
    </div> --}}
@endsection