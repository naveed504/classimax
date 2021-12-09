@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit FAQ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">FAQ</li>
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
                            <h3 class="card-title">FAQ <small>Edit</small></h3>
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
                        <form method="POST" action="{{ route('faq.update', [$faq->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Question: </label>
                                            <input type="text" name="question" class="form-control"
                                                value="{{ $faq->question }}" />
                                        </div>
                                    </div>
                                    
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Answer:</label>
                                            <textarea class="form-control" rows="3" name="answer"
                                                value={{ $faq->answer }}
                                                placeholder="Enter ...">{{ $faq->answer }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
