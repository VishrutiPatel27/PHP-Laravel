@extends('layouts.app')
@section('content')
<div class="container">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <div class="container">
        <div class="row" style="margin-top: 5rem;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show</h2>
                </div>
                <div>
                    <div class="pull-right" style=" float : right;">
                        <a class="btn btn-primary" style="float:right ;margin-right:5px;" href="{{ route('movie.index') }}"> Back</a>
                        @if(auth()->user()->usertype == '1')
                        <a class="btn btn-success" style="float:right ;margin-right:5px;" href="show/create">Add Show</a>
                        @endif
                    </div>
                </div>
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
            <th>Show</th>
            @if(auth()->user()->usertype == '1')
            <th>Movie</th>
            @endif
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="tbody">
            @foreach($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->name }}</td>
                @if(auth()->user()->usertype == '1')
                <td>{{ $value->moviename}}</td>
                @endif
                <td>{{ $value->date}}</td>
                <td>{{ $value->time}}</td>
                <td>{{ $value->location}}</td>
                <td>{{ $value->active}}</td>
                <td>

                    @if(auth()->user()->usertype == '0')
                    <form action="" method="POST">
                        <a class="btn btn-warning" href="">Play</a>
                        @csrf
                    </form>
                    @endif
                    @if(auth()->user()->usertype == '1')
                    <form action="{{ route('show.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('show.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete"
                            onclick="return confirm('Are you sure you want to delete this')">Delete</button>

                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection