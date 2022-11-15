@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.update',['id'=>$setting->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="parent_name">Config key:</label>
                    <input type="text" class="form-control" name="config_key" placeholder="Config key.........." value="{{$setting->config_key}}">
                    <label for="parent_name">Config value:</label>
                    @if(request()->type === 'text')
                        <input type="text" class="form-control" name="config_value" placeholder="Config value.........." value="{{$setting->config_value}}">
                    @elseif(request()->type === 'Textarea')
                        <textarea class="form-control" name="config_value" placeholder="Config value.........." rows="5">{{$setting->config_value}}</textarea>
                    @endif
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
