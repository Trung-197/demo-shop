@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{route('permissions.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="parent_name">Module:</label>
                    <select class="custom-select rounded-0" name="module_parent">
                        <option value="">--Select Module Name--</option>
                        @foreach(config('permissions.table_module') as $module)
                            <option value="{{$module}}">{{$module}}</option>
                        @endforeach
                    </select>
                    <div class="row">
                        @foreach(config('permissions.module_childrent') as $moduleChidrent)
                        <div class="col-md-3">
                            <label for="">
                                <input type="checkbox" name="module_childrent[]" value="{{ $moduleChidrent }}">
                                {{ $moduleChidrent }}
                            </label>
                        </div>
                        @endforeach

                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
