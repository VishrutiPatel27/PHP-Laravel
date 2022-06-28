@extends('layouts.app')

@section('content')

<div class="container">
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <h2>Category</h2>
        </div>
        <div class="pull-right" style=" float : right;">
            <a class="btn btn-warning" href="category/create">Add New Category</a>
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr style="background-color: #BC8F8F">
        <th>No</th>
        <th>Category</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{$value->id }}</td>
        <td>{{ $value->cname }}</td>
        <td>{{ $value->active }}</td>
        <td>
                    @if(request()->has('trashed'))
                    <form action="{{ route('category.delete',$value->id) }}" method="GET">
                    <a href="{{ route('category.restore', $value->id) }}" class="btn btn-success">Restore</a>
                    @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete">Delete</button>
                    @else
            <form action="{{ route('category.destroy',$value->id) }}" method="POST">

            <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>  
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger">Delete</button>
                
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>

<div class="float-end" style="text-align:right;">
        @if(request()->has('trashed'))
            <a href="{{ route('category.index') }}" class="btn btn-info">View All Category</a>
            <a href="{{ route('category.restoreAll') }}" class="btn btn-success">Restore All</a>
        @else
            <a href="{{ route('category.index', ['trashed' => 'category']) }}" class="btn btn-primary">View Deleted Category</a>
        @endif
    </div>

</div>
@endsection