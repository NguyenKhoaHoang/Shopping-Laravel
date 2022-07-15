<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Permission</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Permissions', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Chọn tên module</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach (config('permissions.table_module') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ ucfirst($moduleItem) }}</option>
                                    @endforeach



                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    @foreach (config('permissions.module_childrent') as $moduleChildrentItem)
                                    <div class="col-md-3">
                                        <label>
                                            <input name="module_childrent[]" type="checkbox" value="{{ $moduleChildrentItem }}">
                                            {{ ucfirst($moduleChildrentItem) }}
                                        </label>
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
    </div>
@endsection
