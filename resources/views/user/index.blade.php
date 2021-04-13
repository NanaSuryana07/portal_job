@extends('layout.master')

@section('content')
<div class="container text-center">
    <h1 class="font-weight-light mt-4 text-white">Hello, {!! $user->name !!}!</h1>
    <h2 class="font-weight-light text-white-50">Welcome back</h2>
</div>
<div class="container col-md-8">
    <div class="row" style="background-color:white;border-radius:25px;border:20px solid white">
        <div class="col-md-12">
            <table class="table">
                <h4>Job You Applied</h4>
                @foreach ($users as $user)
                @if ($user->jobs->isEmpty())
                    <p>You haven't applied any job yet</p>
                @else
                @foreach ($user->jobs as $job)
                <tr>
                    @if ($job->image=='image/')
                    <td style="width:20%"><img src="{!! asset('no-image.png') !!}" alt="" style="width:100%"></td>
                    @else
                    <td style="width:20%"><img src="{!! asset($job->image) !!}" alt="" style="width:100%"></td>
                    @endif
                    <td>
                        <h4><a href="{{ route('user.viewjob', $job->id) }}">{!! $job->position !!}</a></h4>
                        @php
                            $n = DB::table('job_user')->select('status')->where('job_id', $job->id)->where('user_id', $user->id)->get()
                        @endphp
                        <p class="badge badge-secondary">{!! $n[0]->status !!}</p>
                        <small><strong>{!! $job->company !!}</strong> added on {!! date('F j, Y', strtotime($job->created_at)) !!}</small><br>
                        <small style="color:green">Rp {!! number_format($job->salary) !!}</small>
                        <p>{!! str_limit($job->description, 300) !!}</p>
                    </td>
                </tr>
                    @endforeach   
                @endif 
                @endforeach
                {{ $users->links() }}
            </table>
        </div>
    </div>
</div>
@endsection
