@extends('layout.admin')
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

    <div class="container">
        <div class="row">
            <div class="cold-md-10">
                <h2 class="font-weight-light text-blue">Home</h2>
            </div>
        </div><br>
        <div>
            <table class="table">
                <tr class="font-weight-bold mb-2">
                    <td>Job Name</td>
                    <td>Status</td>
                    <td>Applicant</td>
                    <td>CV</td>
                    <td>Approval</td>
                </tr>
                @foreach ($users as $user)
                @foreach ($user->jobs as $job)
                @php
                    $n = DB::table('job_user')->select('*')->where('job_id', $job->id)->where('user_id', $user->id)->get()
                @endphp
                @if ($n[0]->status=='Unread')
                <tr>
                    <td class="btn-link"><a href="{{ route('admin.showjob', $job->id) }}">{!! $job->position !!} at {!! $job->company !!}</a></td>
                    <td>
                        {!! $n[0]->status !!}
                    </td>
                    <td class="btn-link"><a href="{{ route('admin.showuser', $user->id) }}">{!! $user->name !!}</a></td>
                    <td>
                        <a href="{!! asset($user->profiles->cv) !!}" target="_blank"><i class="fas fa-eye    "></i></a>
                        <a href="{!! asset($user->profiles->cv) !!}" download><i class="fas fa-download    "></i></i></a>
                    </td>
                    <td>
                        <form action="{{ route('admin.approval', $n[0]->id) }}" method="POST">
                            {{csrf_field()}}{{method_field('PUT')}}
                            <input type="hidden" name="userid" value="{!! $user->id !!}">
                            <input type="hidden" name="jobid" value="{!! $job->id !!}">
                            <button type="submit" name="status" class="btn btn-primary" value="Accept">Accept</button>
                            <button type="submit" name="status" class="btn btn-danger" value="Reject">Reject</button>
                        </form>
                    </td>
                </tr>
                @else
                    
                @endif   
                @endforeach    
                @endforeach
                {{ $users->links() }}
            </table>
        </div>
    </div>
@endsection