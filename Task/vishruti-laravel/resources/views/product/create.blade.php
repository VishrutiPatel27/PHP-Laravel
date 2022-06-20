@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right" style="float:right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
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

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
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
                <br>
                <strong>Category</strong>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="">Select</option>
                        @foreach($data as $key => $value)
                            <option value="{{ $value->cname}}">{{ $value->cname}}</option>
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
                <br>
              <input type="hidden" name="user_id" value="{{Auth::user()->email}}" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>
                <select class="form-control" name="active">
                    <option value="">Select</option>
                    <option name="active" value="yes">Yes</option>
                    <option name="active" value="no">No</option>
                </select>
                @if ($errors->has('active'))
                <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <br>
                        <strong>Select Image:</strong>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger" id="imageval"></span>
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
@endsection