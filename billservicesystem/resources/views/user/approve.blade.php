@extends('layouts.app')
@section('content')



<div class="container">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js">
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <h2>Approve Request</h2>
            <div class="pull-right">
            </div>
            <div class="pull-right" style=" float : right;">

                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>

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
            <th>@sortablelink('No')</th>
            <th>@sortablelink('Name')</th>
            <th>@sortablelink('Email')</th>
            <th>@sortablelink('approve')</th>
            <th>@sortablelink('Active')</th>

            @if(auth()->user()->usertype == '1')
            <th width="280px">Action</th>
            @endif
        </tr>
        @foreach($user as $key => $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->approve }}</td>
            <td>{{ $value->active }}</td>
            <td>

                <form method="get" action="{{route('user.accept',$value->id) }}"> @csrf

                    <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Are you sure you want to approve this?')">Approve</button>

                </form>

            </td>
        </tr>
        @endforeach
    </table>

    {!! $user->appends(\Request::except('page'))->render() !!}

</div>
@endsection