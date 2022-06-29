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

            @if(request()->has('trashed'))

<a href="{{ route('category.index') }}" class="btn btn-info">View All products</a>


@else

<a href="{{ route('category.index', ['trashed' => 'categories']) }}" class="btn btn-primary">Deleted</a>

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
    <tr style="background-color: #BC8F8F">
        <th>No</th>
        <th>Category</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->cname }}</td>
        <td>{{ $value->active }}</td>
        <td>
                  
            <form action="{{ route('category.destroy',$value->id) }}" method="POST">
                @if(request()->has('trashed'))
                <a class="btn btn-info" href="{{ route('category.restore',$value->id)}}">Restore</a>
                @else
            <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>  
            @endif

            @if(request()->has('trashed'))
            <a class="btn btn-danger" href="{{ route('category.delete',$value->id) }}">Delete</a>
            @else
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger">Delete</button>
                @endif
            </form>
           
        </td>
    </tr>
    @endforeach
</table>
{!! $data->links() !!}


</div>
@endsection