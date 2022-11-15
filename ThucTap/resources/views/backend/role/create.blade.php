@extends('layouts.template')

@section('content')
    <div class=" card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Role Name:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Role Name..." value="{{old('name')}}" required>
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                    <label for="name">Description:</label>
                    <textarea  class="form-control rounded-0" name="display_name" placeholder="Description..." required>{{old('display_name')}}</textarea>
                    @if($errors->has('description'))
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    @endif
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" class="checkall">
                                checkall
                            </label>
                        </div>
                            @foreach($permissionParents as $permissionParent)
                            <div class="card text-white bg-white mb-3 col-md-12" style="width: 100%;">
                            <div class="card-header bg-primary">
                                <label>
                                    <input type="checkbox" name="" value="" class="checkbox_wrapper">
                                </label>
                                Module {{$permissionParent->name}}
                            </div>
                               <div class="row">

                                    @foreach($permissionParent->permissionsChidrent as $permissionsChidrentItem)
                                    <div class="card-body">
                                      <h5 class="card-title">
                                        <label>
                                            <input class="checkbox_childrent" type="checkbox" name="permission_id[]" value="{{$permissionsChidrentItem->id}}">
                                        </label>
                                          {{$permissionsChidrentItem->name}}
                                        </h5>
                                     </div>
                                   @endforeach
                               </div>
                            </div>
                            @endforeach
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
