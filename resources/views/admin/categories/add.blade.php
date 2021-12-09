@extends('admin.layouts.app')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category <small>Add</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->



                        @if ($errors->any())
                            <div id="pageMessages">
                                <div class="alert animated flipInX alert-danger alert-dismissible">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p><span class="close" data-dismiss="alert"
                                            style="cursor: pointer;">&times;</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="mt-1">
                                <li class="alert alert-success" style="list-style-type:none">{!! \Session::get('success') !!}</li>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryname">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="category-name"
                                        placeholder="Enter Name">
                                </div>

                                <div class="form-group">

                                    <label>Parent Category</label>
                                    <select class="form-control select2" name="parent_id" style="width: 100%;">
                                        <option value="">Select Parent Category</option>
                                        @if (isset($categories))
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
