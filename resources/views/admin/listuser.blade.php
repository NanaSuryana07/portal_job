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
                <h2 class="font-weight-light text-blue">Users Lists</h2>
            </div>
        </div><br>
        <div>
            <table class="table">
                <tr class="font-weight-bold mb-2">
                    <td>Full Name</td>
                    <td>Role</td>
                    <td>Email</td>
                    <td>Registered at</td>
                    <td>Action</td>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td class="btn-link"><a href="{{ route('admin.showuser', $user->id) }}">{!! $user->name !!}</a></td>
                    @foreach ($user->roles as $role)
                    <td>{!! $role->name !!}</td>
                    @endforeach
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->created_at !!}</td>
                    <td>
                        <a href="{{ route('admin.deleteuser', $user->id) }}" alt="Delete" onclick="return confirm('Are you sure?')"><i class="fas fa-eraser    "></i></a>
                    </td>
                </tr>       
                @endforeach
                {{ $users->links() }}
            </table>
        </div>
    </div>
@endsection