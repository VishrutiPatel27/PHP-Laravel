@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container">
        <div class="row" style="margin-top: 5rem;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Moive</h2>
                </div>
                <div>
                    <div class="pull-right" style=" float : right;">
                        @if(auth()->user()->usertype == '1')
                        <a href="{{ route('movie.export') }}"style="float:right;" class="btn btn-warning">Export Data</a>
                        <a class="btn btn-info" style="float:right;  margin-right:5px;"href="{{ route('admin.index') }}"> User</a>
                        <a class="btn btn-primary" style="float:right ;margin-right:5px;" href="{{ route('show.index') }}">Show</a>                      
                        <a class="btn btn-success" style="float:right ;margin-right:5px;" href="movie/create">Add New Movie</a>
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
        <tr style="background-color: #ADD8E6;"> 
            <th>@sortablelink('No')</th>
            <th>@sortablelink('Name')</th>
            <th>@sortablelink('Description')</th>
            <th>@sortablelink('Small Image')</th>
            <th>@sortablelink('Big Image')</th>
            <th>@sortablelink('Active')</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="tbody">
            @foreach($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td><img src=" {{ asset('public/images/' . $value->simage)}}" width="50" height="30"></td>
                <td><img src=" {{ asset('public/image/' . $value->bimage)}}" width="100" height="80"></td>
                <td>{{ $value->active}}</td>
                <td>

                    @if(auth()->user()->usertype == '0')
                    <form action="" method="POST">
                        <a class="btn btn-success" href="{{ route('show.show',$value->id) }}">Book</a>
                        @csrf
                    </form>
                    @endif
                    @if(auth()->user()->usertype == '1')
                    <form action="{{ route('movie.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('movie.edit',$value->id) }}">Edit</a>
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

    {!! $data->appends(\Request::except('page'))->render() !!}

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection