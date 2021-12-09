@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title">User <small>Add</small></h3>
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
                                <li class="alert alert-success " style="list-style-type:none">{!! \Session::get('success') !!}</li>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="email_verified_at">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="title"
                                                placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" name="confirm_password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Roles</label>
                                            <select name="roles" class="form-control select2" multiple style="width: 100%;">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                   
                                                <option value="{{$role}}">{{$role}}</option>
                                              
                                            
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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