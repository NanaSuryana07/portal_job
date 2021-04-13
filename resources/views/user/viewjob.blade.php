@extends('layout.master')
@section('content')
    <div class="container col-md-8">
        <div class="row" style="background-color:white;border-radius:25px;border:20px solid white">
            <a class="text-center col-md-4">
                @if ($job->image=='image/')
                <img class="col-md-12" src="{!! asset('no-image.png') !!}" alt="">
                @else
                <img class="col-md-12" src="{!! asset($job->image) !!}" alt="">
                @endif
            </a>
            <div class="col-md-8">
                <h4>{!! $job->position !!}</h4>
                <p><strong>{!! $job->company !!}</strong> added on {!! date('F j, Y', strtotime($job->created_at)) !!}</p>
                <p style="color:green">Rp {!! number_format($job->salary) !!}</p>
                <p>{!! $job->description, 300 !!}</p>

                @if (!$app->isEmpty())
                <button class="btn btn-outline-warning" onclick="window.location.href='{{ route('user.destroy', $job->id) }}';"><i class="fas fa-smile-wink    "></i> Cancel Application</button>

                @else
                    <form action="{{ route('user.applyjob', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" name="submit" class="btn btn-outline-primary" onclick="return confirm('Are you sure?')"><i class="fas fa-bookmark    "></i> Apply For This Job</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection