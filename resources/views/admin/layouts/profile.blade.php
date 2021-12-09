
@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$data->name}}  Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post</li>
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
                        <form method="POST" action="{{ route('profile.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $data->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <div class="input-group">
                                                <input type="email" name="email" value="{{ $data->email }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="passs" >
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Password</label>
                                            <input type="password" name="password" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                    </div>
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

