@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Name..." value="{{$slider->name}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                    <label for="name">Description:</label>
                    <input type="text" class="form-control rounded-0" name="description" placeholder="Description..." value="{{$slider->description}}">
                    @if($errors->has('description'))
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    @endif
                    <label>Image:</label>
                    <input type="file" class="form-control file" name="image_path">
                    <input type="hidden" name="image_path" value="{{$slider->image_path}}">

                    <img src="/sliders/{{$slider->image_path}}" height="100px" width="100px">
                    <br>
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
