

@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Show</h2>
        </div>
        <div class="pull-right" style="float:right">
            <a class="btn btn-primary" href="{{ route('show.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('show.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="text" name="date" class="form-control" value="{{old('date')}}" placeholder="Enter date">
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong>
                <input type="text" name="time" class="form-control" value="{{old('time')}}" placeholder="Enter time">
                @if ($errors->has('time'))
                <span class="text-danger">{{ $errors->first('time') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control" value="{{old('location')}}" placeholder="Enter location">
                @if ($errors->has('location'))
                <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Movie</strong>
                <select name="movie_id" class="form-control" id="movie_id">
                    <option value="">Select</option>
                        @foreach($data as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                </select>
            @if ($errors->has('dropdown'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('dropdown') }}</strong>
                </span>
            @endif
                </select>
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>
                <select class="form-control" name="active">
                    <option value="">Select</option>
                    <option name="active" value="active">Active</option>
                    <option name="active" value="inactive">Inactive</option>
                </select>
                @if ($errors->has('active'))
                <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
@endsection