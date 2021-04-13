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
                <h2 class="font-weight-light text-blue">Job Lists</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.createjob') }}" class="btn btn-outline-primary"><i class="fas fa-pen-fancy    "></i> Add Job</a>
            </div>
        </div><br>
        <div>
            <table class="table">
                <tr class="font-weight-bold mb-2">
                    <td style="width:20%">Image</td>
                    <td>Position Name</td>
                    <td>Company Name</td>
                    <td>Salary (Rp)</td>
                    <td>Description</td>
                    <td>Action</td>
                </tr>
                @foreach ($jobs as $job)
                <tr>
                    @if ($job->image=='image/')
                    <td style="width:20%"><img src="{!! asset('no-image.png') !!}" alt="" style="width:100%"></td>
                    @else
                    <td style="width:20%"><img src="{!! asset($job->image) !!}" alt="" style="width:100%"></td>
                    @endif
                    <td>{!! $job->position !!}</td>
                    <td>{!! $job->company !!}</td>
                    <td>{!! number_format($job->salary) !!}</td>
                    <td>{!! str_limit($job->description, 250) !!}<a href="{{ route('admin.showjob', $job->id) }}" style="color:dodgerblue">Read More</a></td>
                    <td>
                        <a href="{{ route('admin.editjob', $job->id) }}" alt="Edit"><i class="fas fa-edit    "></i></a>
                        <a href="{{ route('admin.deletejob', $job->id) }}" alt="Delete" onclick="return confirm('Are you sure?')"><i class="fas fa-eraser    "></i></a>
                    </td>
                </tr>       
                @endforeach
                {{ $jobs->links() }}
            </table>
        </div>
    </div>
@endsection