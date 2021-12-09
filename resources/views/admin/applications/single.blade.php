@extends('admin.layouts.app')
@section('custom-css')
<style>
    #tes {
        display: flex;
    }

</style>

@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Allications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Applications</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    @if (\Session::has('success'))
        <div class="mt-1">
            <li class="alert alert-success" style="list-style-type:none">{!! \Session::get('success') !!}</li>
        </div>
    @endif
    {{-- <div class="mt-1">
        <li class="alert alert-success" style="display: none;" id="succ" style="list-style-type:none">Status Updated
            SuccessFully</li>
    </div> --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                        <h5><label>Application Type: </label> {{$application->type}}</h5>
                        <h5><label>Buisness Name: </label> {{$application->b_name}}</h5>
                        <h5><label>Email: </label> {{$application->email}}</h5>
                        <h5><label>Website Link: </label> {{$application->social_links}}</h5>
                        
                        @if(isset($application->u_name))
                        <h5><label>User Name: </label> {{$application->u_name}}</h5>
                        @endif

                        @if(isset($application->b_address))
                        <h5><label>Buisness Address: </label> {{$application->b_address}}</h5>
                        @endif
                        
                        @if(isset($application->select))
                        <h5><label>Offer: </label> 
                        @if($application->select == "other")
                        {{$application->message}}
                        @else
                        {{$application->select}}
                        </h5>
                        @endif
                        @endif
                        
                        @if(isset($application->has_document))
                        @if($application->has_document == 'on')
                        <h5><label>Can provide a 501c3 docuemnt up on request</label></h5>
                        @else
                        <h5><label>Can't provide a 501c3 docuemnt up on request</label></h5>
                        @endif
                        @endif
                        
                        @if($application->type == 'nonporfit')
                        <h5><label>Description: </label> {{$application->message}}</h5>
                        @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
