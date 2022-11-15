@extends('layouts.template')

@section('content')
    <div class="col-md-12">
        <div class="btn-group">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Action
                <span class="caret">
                </span>
            </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('settings.create') . '?type=text'}}">Text</a></li>
                    <li><a href="{{route('settings.create') . '?type=Textarea'}}">Textarea</a></li>
                </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-6">
                    <p class="mb-0">List</p>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-success btn-sm float-right" href="{{route('settings.create')}}">Add</a>
                </div>
            </h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 20%">Config key</th>
                    <th style="width: 20%">Config value</th>
                    <th style="width: 20%">Action</th>

                </tr>
                </thead>
                @foreach($settings as $setting)
                <tbody>
                    <th style="width: 20%">{{$setting->id}}</th>
                    <th style="width: 20%">{{$setting->config_key}}</th>
                    <th style="width: 20%">{{$setting->config_value}}</th>
                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="{{ route('settings.edit',['id' => $setting->id]) . '?type=' .$setting->type}}">Edit</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                          <a onclick="del({{ $setting->id }})">Delete</a>
                            <form id="form-{{ $setting->id }}" class="d-none" action="{{ route('settings.delete', $setting->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </span>

                    </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $settings->links() }}
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
