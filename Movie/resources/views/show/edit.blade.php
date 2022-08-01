@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Show</h2>
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

<form action="{{ route('show.update',$show->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $show->name }}" class="form-control"
                    placeholder="name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="text" name="date" value="{{ $show->date }}" class="form-control"
                    placeholder="date">
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong>
                <input type="text" name="time" value="{{ $show->time }}" class="form-control"
                    placeholder="time">
                @if ($errors->has('time'))
                <span class="text-danger">{{ $errors->first('time') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" value="{{ $show->location }}" class="form-control"
                    placeholder="location">
                @if ($errors->has('location'))
                <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Movie:</strong>
                <select class="form-control" name="category">
                    <option value="">Select</option>
                    @foreach($data as $key => $value)
                                 <option value="{{$value->name}}" {{$show->movie_id==$value->name ? "selected":""}}>{{$value->name}}</option>
                    @endforeach
                   
                </select>   
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>
                <select class="form-control" name="active">
                    <option value="">Select</option>
                    <option value="active" {{ $show->active=="active"? "selected" : "" }}>Active</option>
                    <option value="inactive" {{ $show->active=="inactive"? "selected" : "" }}>Inactive</option>
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