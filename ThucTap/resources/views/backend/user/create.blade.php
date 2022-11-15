@extends('layouts.template')

@section('content')
    <style>
        .select2-selection__choice__display{
            background-color: #6c757d;
        }
    </style>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Name..." value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                    <label for="name">Email:</label>
                    <input type="text" class="form-control rounded-0" name="email" placeholder="Email..." value="{{old('email')}}">
                    @if($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                    <label for="name">Password:</label>
                    <input type="password" class="form-control rounded-0" name="password" placeholder="Password..." value="{{old('password')}}">
                    @if($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                    <label for="name">Role:</label>
                    <select name="role_id[]" class="form-control select2_init" multiple>
                        @foreach($roles as  $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
        </div>
    </div>

@endsection
