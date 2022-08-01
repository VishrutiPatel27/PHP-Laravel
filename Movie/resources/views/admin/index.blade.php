@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>Admin</h2>
            </div>
            <div class="pull-right" style=" float : right;">

                <a class="btn btn-primary" style="float:right ;margin-right:5px;" href="{{ route('movie.index') }}"> Back</a>
                <a class="btn btn-success" style="float:right ;margin-right:5px;" href="admin/create">Add New User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr style="background-color: #4682B4">
            <th>No</th>
            <th>Name</th>
            <th>Email</th>

            @if(auth()->user()->usertype == '1')
            <th width="280px">Action</th>
            @endif
        </tr>
        @foreach($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>

            @if(auth()->user()->usertype == '1')
            <td>
                <form action="{{ route('admin.destroy',$value->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this')">Delete</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
    @endsection
</div>