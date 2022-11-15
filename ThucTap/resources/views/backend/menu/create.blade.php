@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Name...">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                    <label for="parent_name">Parent name:</label>
                    <select class="custom-select rounded-0" name="parent_name">
                        <option value="0">--Select Parent Name--</option>
                        {!! $optionSelect !!}
                    </select>
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
