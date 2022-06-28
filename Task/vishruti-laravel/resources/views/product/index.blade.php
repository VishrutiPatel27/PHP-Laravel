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
                    <h2>Product</h2>
                </div>
                <div>
                    <select id="category_id" name="cat_id" class="btn btn-secondary dropdown-toggle class-form-control"
                        style="width:15%;">
                        <option value="">All</option>
                        @foreach($data1 as $key => $value)
                        <option value="{{ $value->cname }}">{{ $value->cname }}</option>>
                        @endforeach
                    </select>

                    <a class="btn btn-success" style="float:right" href="product/create">Add New Product</a>
                    <a class="btn btn-info" style="float:right" href="{{ route('admin.index') }}"> Admin</a>
                    <a class="btn btn-warning" style="float:right" href="{{ route('category.index') }}"> Category</a>
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
        <tr style="background-color: #FA8072">
            <th>No</th>
            <th>Product</th>
            <th>Category</th>
            <th>Image</th>
            <th>Created By</th>
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="tbody">
            @foreach($data as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>>
                <td>{{ $value->name }}</td>
                <td>{{ $value->category_id }}</td>
                <td><img src=" {{ asset('public/images/' . $value->image)}}" width="100" height="80"></td>
                <td>{{ $value->user_id}}</td>
                <td>{{ $value->active}}</td>
                <td>

                    @if(request()->has('trashed'))
                    <form action="{{ route('product.delete',$value->id) }}" method="GET">
                    <a href="{{ route('product.restore', $value->id) }}" class="btn btn-success">Restore</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete">Delete</button>
                    </form>
                    
                    @else
                    <form action="{{ route('product.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('product.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-end" style="text-align:right;">

        @if(request()->has('trashed'))
            <a href="{{ route('product.index') }}" class="btn btn-info">View All products</a>
            <a href="{{ route('product.restoreAll') }}" class="btn btn-success">Restore All</a>
        @else
            <a href="{{ route('product.index', ['trashed' => 'product']) }}" class="btn btn-primary">View Deleted product</a>
        @endif

    </div>
    @foreach($data as $key => $value)
    <script>
    $(document).ready(function() {
        $('#category_id').change(function() {

            var category = $(this).val();


            $.ajax({
                url: "{{ url('filterProduct') }}",
                type: "GET",
                data: {
                    'category': category
                },
                success: function(data) {


                    var products = data;

                    var html = '';
                    if (products.length > 0) {
                        for (let i = 0; i < products.length; i++) {
                            html += '<tr>\
                                        <td>' + (i + 1) + '</td>\
                                        <td>' + products[i]['name'] + '</td>\
                                        <td>' + products[i]['category_id'] + '</td>\
                                        <td> <img src="public/images/' + products[i]['image'] + '"width="100" height="80"> </td>\
                                        <td>' + products[i]['user_id'] + '</td>\
                                        <td>' + products[i]['active'] + '</td>\
                                        <td><form action="{{ route('product.destroy' ,$value->id) }}" method="POST"><a class="btn btn-primary" href="{{ route('product.edit',$value->id) }}">Edit</a> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button></form></td> </tr>';
                        }
                    } else {
                        html += '<tr>\
                                    <td>No Products Found</td>\
                                    </tr>';
                    }
                    $("#tbody").html(html);
                }
            });
        });
    });
    </script>
    @endforeach
</div>
@endsection