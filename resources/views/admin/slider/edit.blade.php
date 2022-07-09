<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Edit Slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'menus', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group @error('name') is-invalid @enderror">
                                <label>Tên slider</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên menu"
                                    value="{{ $slider->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label>Mô tả slider</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ $slider->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh slider</label>
                                <input type="file" class="form-control-file"
                                    name="image_path">
                                <div class="col-md-4">
                                    <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
