@extends('layout.master')
@section('content')
    <div class="container col-md-8">
        <div class="row" style="background-color:white;border-radius:25px;border:20px solid white">
            <div class="col-md-8">
                {{ $jobs->links() }}
            </div>
            <div class="col-md-4">
                <form action={{ route('user.listjob') }} method="get" class="">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                </form>
            </div>

            <div class="col-md-12">
                <br>
                <table class="table">
                    @foreach ($jobs as $job)
                    <tr>
                        @if ($job->image=='image/')
                        <td style="width:20%"><img src="{!! asset('no-image.png') !!}" alt="" style="width:100%"></td>
                        @else
                        <td style="width:20%"><img src="{!! asset($job->image) !!}" alt="" style="width:100%"></td>
                        @endif
                        <td>
                            <h4><a href="{{ route('user.viewjob', $job->id) }}">{!! $job->position !!}</a></h4>
                            <small><strong>{!! $job->company !!}</strong> added on {!! date('F j, Y', strtotime($job->created_at)) !!}</small><br>
                            <small style="color:green">Rp {!! number_format($job->salary) !!}</small>
                            <p>{!! str_limit($job->description, 300) !!}</p>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-md-8">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
@endsection