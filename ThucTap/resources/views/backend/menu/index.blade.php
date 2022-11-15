@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-6">
                    <p class="mb-0">List</p>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-success btn-sm float-right" href="{{ route('menu.create') }}">Add</a>
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
                @foreach($menus as $menu)
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="{{ route('menu.edit', $menu->id) }}">Edit</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                            <a onclick="del({{ $menu->id }})">Delete</a>
                            <form id="form-{{ $menu->id }}" class="d-none" action="{{ route('menu.delete', $menu->id) }}" method="post">
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
              {{ $menus->links() }}
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
