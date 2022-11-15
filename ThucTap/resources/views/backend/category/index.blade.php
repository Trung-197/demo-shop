@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-6">
                    <p class="mb-0">List</p>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-success btn-sm float-right" href="{{ route('category.create') }}">Add</a>
                </div>
            </h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 80%">Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                            <a onclick="del({{ $category->id }})">Delete</a>
                            <form id="form-{{ $category->id }}" class="d-none" action="{{ route('category.delete', $category->id) }}" method="post">
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
              {{ $categories->links() }}
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
