@extends('layout.blank')
@section('content')

@if (Session::has('error'))
<div class="alert alert-danger">
    <p>{{Session::get('error')}}</p>
</div>
@elseif (Session::has('flash_message'))
<div class="alert alert-success">
    <p>{{Session::get('flash_message')}}</p>
</div>
@endif

    <div class="container col-md-8">
        <div class="row" style="background-color:white;border-radius:25px;border:20px solid white">
            <h5 class="card-title"></h5>
            <a class="text-center col-md-4">
                <img class="col-md-12" style="border-radius:50%" src="{{asset($profile->photo)}}" alt="{!! $user->name !!}">
            </a>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td>Full Name</td>
                        <td>: {!! $user->name !!}</td>
                    </tr>
                    <tr>
                        <td>Birth Date</td>
                        <td>: {!! $user->birth_date !!}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>: {!! $user->email !!}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>: {!! $profile->address !!}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>: {!! $profile->phone !!}</td>
                    </tr>
                    <tr>
                        <td>Education and Experience</td>
                        <td>: {!! $profile->ed_ex !!}</td>
                    </tr>
                </table>
                <div>
                    <a href="{{route('admin.listapp')}}" class="btn btn-outline-primary"><i class="fas fa-backward    "></i> Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection