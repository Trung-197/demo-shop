@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.store') . '?type=' .request()->type }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="parent_name">Config key:</label>
                    <input type="text" class="form-control" name="config_key" placeholder="Config key..........">
                    <label for="parent_name">Config value:</label>
                    @if(request()->type === 'Textarea')
                        <textarea class="form-control" name="config_value" placeholder="Config value.........." rows="5"></textarea>
                    @else
                        <input type="text" class="form-control" name="config_value" placeholder="Config value..........">
                    @endif
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
