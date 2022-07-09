<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Setting</title>
@endsection




@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'settings', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text" class="form-control" name="config_key" placeholder="Nhập config key">
                            </div>

                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text" class="form-control" name="config_value"
                                        placeholder="Nhập config value">
                                </div>
                            @elseif (request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea type="text" class="form-control" name="config_value"
                                        placeholder="Nhập config value" rows="5"></textarea>
                                </div>
                            @endif



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
