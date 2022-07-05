<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'product', 'key' => 'Add'])

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện sản phẩm</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết sản phẩm</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhập tag cho sản phẩm</label>
                                <select name="tags" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>





                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea name="content" class="form-control tinymce_editor_init" rows="8"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
