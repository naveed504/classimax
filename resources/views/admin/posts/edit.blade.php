@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <h3 class="card-title">Post <small>Edit</small></h3>
                        </div>
                       
                        <!-- /.card-header -->
                        <!-- form start -->

                        
                        @if (\Session::has('success'))
                            <div class="mt-1">
                                <li class="alert alert-success " style="list-style-type:none">{!! \Session::get('success') !!}</li>
                            </div>
                        @endif
                        @if ($errors->any())
                        <div id="pageMessages">
                          <div class="alert animated flipInX alert-danger alert-dismissible">
                          @foreach ($errors->all() as $error)
                          <p>{{$error}}</p><span class="close" data-dismiss="alert" style="cursor: pointer;">&times;</span>
                          @endforeach
                        </div>
                        </div>    
                      @endif
                        <form method="POST" action="{{ route('post.update', [$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $post->title }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $cat->id == $post->category_id ? 'selected' : '' }}>
                                                        {{ $cat->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Expiration Date:</label>
                                            <div class="input-group">
                                                <input type="date" name="expire_date" value="{{ $post->expire_date }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <div class="input-group">
                                              
                                                <input type="number" value="{{ $post->price }}" name="price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <div class="input-group">
                                                <input type="file" name="image" value={{ $post->image }} multiple
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" rows="3" name="description"
                                                value={{ $post->description }}
                                                placeholder="Enter ...">{{ $post->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="save" value="save" class="btn btn-primary">Update and Publish</button>
                                @if($post->isDraft == 1)
                                <button type="submit" name="draft" value="draft" class="btn btn-info">Update and Save as Draft</button>
                                @endif
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
