@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Page</li>
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
                        <h3 class="card-title">Page <small>Update</small></h3>
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
                    <form method="POST" action="{{route('save-page-data')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                           
                            <input type="hidden" name="type" value="privacyPolicy">
                            <input type="hidden" name="id" value="{{$data->id}}">

                            <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter Title" value="{{$data->title}}" >
                                    </div>
                                 </div>
                                    
                              
                            </div>   
                            <div class="form-group">
                                <label for="description">Description</label>
                            <textarea class="ckeditor form-control" name="description">{{$data->description}}</textarea>
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

@section('custom-js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection