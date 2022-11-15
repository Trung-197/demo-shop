@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Name..." value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                    <label for="name">Price:</label>
                    <input type="text" class="form-control rounded-0" name="price" placeholder="Price..." value="{{old('price')}}">
                    @if($errors->has('price'))
                        <p class="text-danger">{{$errors->first('price')}}</p>
                    @endif
                    <label for="name">Avatar:</label>
                    <input type="file" multiple class="form-control-file rounded-0" name="feature_image_path" placeholder="Image...">
                    @if($errors->has('feature_image_path'))
                        <p class="text-danger">{{$errors->first('feature_image_path')}}</p>
                    @endif
                    <label for="parent_name">Parent name:</label>
                    <select class="custom-select rounded-0" name="category_id">
                        <option value="0">--Select Parent Name--</option>
                        {!! $htmlOption !!}
                    </select>
{{--                    <label for="parent_name">Tags:</label>--}}
{{--                    <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">--}}

{{--                    </select>--}}
                    <label for="name">Content:</label>
                    <textarea class="form-control tinymce_editor_init" rows="3" name="contents">{{old('contents')}}</textarea>
                    @if($errors->has('contents'))
                        <p class="text-danger">{{$errors->first('contents')}}</p>
                    @endif
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
