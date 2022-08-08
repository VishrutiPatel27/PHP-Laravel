@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js">
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Profile</h2>
            </div>
            <div class="pull-right" style="float:right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
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

    <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                        placeholder="name">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control"
                        placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <input type="text" name="approve" id="name" value=0 class="form-control" placeholder="name" hidden>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" id="image" class="form-control">
                    <span class="text-danger" id="imageval"></span>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-control">
                    <strong>Gender:</strong>
                    <input type="radio" name="gender" id="gender" value="male"
                        {{ ($user->gender=="male")? "checked" : "" }}>Male
                    <input type="radio" name="gender" id="gender" value="female"
                        {{ $user->gender=="female"? "checked" : "" }}>Female
                    @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Age:</strong>
                    <select class="form-control" name="age" id="age">
                        <option value="">Select</option>
                        <option value="18-30" {{ $user->age=="18-30"? "selected" : "" }}>18-30</option>
                        <option value="31-40" {{ $user->age=="31-40"? "selected" : "" }}>31-40</option>
                        <option value="above 40" {{ $user->age=="above 40"? "selected" : "" }}>Above 40</option>
                    </select>
                    @if ($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Select Services:</strong>
                        <br>
                        <input value="{{ Auth::user()->id}}" name="user_id" id="service" hidden="true">
                        @foreach($service as $value)
                        <input type="checkbox" name="service[]" value="{{ $value->id}}"
                            {{in_array($value->id,$user_services) ? 'checked' : ''}}>{{ $value->bill}} <br>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
    </form>
</div>
<script>
  $(document).ready(function () {
    $("#form").validate({

        rules: {
            name: {
                required: true,
                minlength: 2
            },

            email: {
                required: true,
            },

            gender: {
                required: true,
            },
            age: {
                required: true,
            },
        },
        messages: {

            name: {
                required: "Please enter name",
            },
            emial: {
                required: "Please enter valid email",
            },
            gender: {
                required: "Please enter Gender",
            },
            age: {
                required: "Please enter age",
            },
        },
        
    })
});

</script>

@endsection