@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Price</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Price</li>
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
                            <h3 class="card-title">Price <small>Edit</small></h3>
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
                        <form method="POST" action="{{ route('pricing.update', $pricing->id) }}" enctype="multipart/form-data">
                            @csrf
                  @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                    
                                        <div class="form-group">
                                            <label>Listing Duration</label>
                                            <select class="form-control select2" name="listing_duration"
                                                style="width: 100%;">
                                                @foreach ($prices as $price)
                                              
                                                    <option value="{{ $price->listing_duration }}"
                                                        {{ $pricing->id == $price->id ? 'selected' : ''  }} disabled>
                                                        {{ $price->listing_duration }} Days</option>
                                                @endforeach

                                               
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="standard">Standard Listing</label>
                                            <input type="number" step="0.01" value="{{$pricing->standard_listing}}" placeholder="eg $0.5" name="standard_listing"
                                                class="form-control" id="standard_listing">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="each_additional_image">Each Additional Image</label>
                                            <input type="number" step="0.01" value="{{$pricing->each_additional_image}}" placeholder="eg $0.45"
                                                name="each_additional_image" class="form-control"
                                                id="each_additional_image">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="each_additional_category">Each Additional Category</label>
                                            <input type="number" step="0.01"  value="{{$pricing->each_additional_category}}" placeholder="eg $0.75"
                                                name="each_additional_category" class="form-control"
                                                id="each_additional_category">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="duration_days">Duration Days To Active Listing</label>
                                            <input type="number" step="0.01" value="{{$pricing->duration_days}}" placeholder="eg $0.59" name="duration_days"
                                                class="form-control" id="duration_days">
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
