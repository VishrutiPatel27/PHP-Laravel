@extends('layouts.app')
@section('content')

<div class="container">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<form method="GET" action="{{route('user.filter')}}">
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <h2>Users</h2>
            <div class="pull-right">
            </div>
            @if(auth()->user()->usertype == '1')
            <select id="bill" name="filter" class="btn btn-primary dropdown-toggle class-form-control">
                <option value="">All</option>
                @foreach($bill as $key => $profile)
                <option value="{{ $profile->id }}">{{ $profile->bill }}</option>>
                @endforeach
            </select>
            <button type="submit">filter</button>
          @endif
</form>
            <div class="pull-right" style=" float : right;">

                <a href=" {{ route('user.export') }}" style="float:right;" class="btn btn-warning">Export Excel</a>
                @if(auth()->user()->usertype == '1')

                <a class="btn btn-info" style="float:right ;margin-right:5px;" href="user/create">Add New
                    User</a>
                <a class="btn btn-success" style="float:right ;margin-right:5px;" href="user/show">Approve</a>
                @endif
                @if(auth()->user()->usertype == '0')
                <a class="btn btn-primary" style="float:right ;margin-right:5px;" href="{{route('user.edit',Auth::user()->id)}}">Update Profile</a>
                @endif

            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <table class="table table-bordered">
        <tr style="background-color:#ADD8E6">

            <th>@sortablelink('id')</th>
            <th>@sortablelink('Name')</th>
            <th>@sortablelink('Email')</th>
            <th>@sortablelink('Active')</th>
            <th>@sortablelink('Approve')</th>
            <th>Services</th>
            @if(auth()->user()->usertype == '0')
            <th>@sortablelink('Image')</th>
            <th>@sortablelink('Gender')</th>
            <th>@sortablelink('Age')</th>
            @endif
            @if(auth()->user()->usertype == '1')
            <th width="180px">Action</th>
            @endif
        </tr>
        @foreach($user as $key => $value)
        <tr>

            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->active }}</td>
            <td>{{ $value->approve }}</td>
            <td> @foreach($value->user_services as $service)
                {{ $service->bill }},
                 @endforeach
            </td>
            @if(auth()->user()->usertype == '0')
            <td><img src=" {{ asset('public/images/' . $value->image)}}" width="80" height="80"></td>
            <td>{{ $value->gender }}</td>
            <td>{{ $value->age }}</td>    
            @endif
          
            @if(auth()->user()->usertype == '1')
            <td>
                <form action="{{ route('user.destroy',$value->id) }}" method="POST">
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
    {!! $user->appends(\Request::except('page'))->render() !!}
</div>
@endsection