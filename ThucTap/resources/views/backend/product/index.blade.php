@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-6">
                    <p class="mb-0">List</p>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-success btn-sm float-right" href="{{route('product.create')}}">Add</a>
                </div>
            </h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 30%">Name</th>
                    <th style="width: 10%">Price</th>
                    <th style="width: 15%">Image</th>
                    <th style="width: 20%">Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->price)}}</td>
                    <td><img src="/products/{{$product->feature_image_path}}" height="60px"  width="60px" alt=""></td>
                    <td>{{$product->category->name ?? null}}</td>

                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="{{ route('product.edit',['id' => $product->id]) }}">Edit</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                            <a onclick="del({{ $product->id }})">Delete</a>
                            <form id="form-{{ $product->id }}" class="d-none" action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </span>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $products->links() }}
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function del(id) {
            document.getElementById('form-'+id).submit();
        }
    </script>
@endpush
