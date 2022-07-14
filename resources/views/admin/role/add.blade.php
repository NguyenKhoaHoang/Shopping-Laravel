<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
    <style>
        .card-header {
            background-color: #52dc8e;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Roles', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data"
                        style="width: 100%">

                        <div class="col-md-12">
                            @csrf
                            <div class="form-group @error('name') is-invalid @enderror">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                    value="{{ old('name') }}">

                            </div>

                            <div class="form-group ">
                                <label>Mô tả Vai trò</label>
                                <textarea class="form-control" name="display_name" rows="4">{{ old('display_name') }}</textarea>
                            </div>



                        </div>

                        <div class="col-md-12">
                            <div class="row">

                                @foreach ($permissionsParent as $permissionParentItem)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="">
                                            </label>
                                            Model {{ $permissionParentItem->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionParentItem->permissionChildrent as $permissionChildrentItem)
                                                
                                            
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]" value="{{ $permissionChildrentItem->id }}">
                                                        </label>
                                                        {{ $permissionChildrentItem->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach


                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
