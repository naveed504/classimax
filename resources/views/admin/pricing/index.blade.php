@extends('admin.layouts.app')
@section('custom-css')

@endsection
<style>
    #tes {
        display: flex;
    }

</style>
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQ's</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">FAQ's</li>
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Listing Duration </th>
                                        <th>Standard Listing</th>
                                        <th>Each Image</th>
                                        <th>Each Category</th>
                                        <th>Days To Active </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        
                                        $id = 1;
                                      
                                    @endphp

                                    @foreach (@$pricing as $price)
                                
                                        @if ( auth()->user()->hasRole('Admin'))
                                            <tr>
                                                <td>{{ $id++ }}</td>
                                                <td>{{ $price->listing_duration }} Days</td>

                                                
                                                <td>${{ $price->standard_listing }}</td>
                                                <td>${{ $price->each_additional_image }}</td>
                                                <td>${{ $price->each_additional_category }}</td>
                                                <td>${{ $price->duration_days }}</td>
                                                <td id="tes">
                                                    <span class="mr-2">
                                                        <a href="{{ route('pricing.edit', $price->id) }}"
                                                            class="btn btn-primary btn-sm"
                                                            style="margin-right: 2px">Edit</a>
                                                    </span>
                                                
                                                    {{-- <span>
                                                        <form method="post" style="margin-left-20;"
                                                            action="{{ route('faq.destroy', $price->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn  btn-danger btn-sm show_confirm">Delete</button>
                                                        </form>
                                                    </span> --}}
                                                </td>
                                            </tr>
                                        @endif
                                    

                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Listing Duration </th>
                                        <th>Standard Listing</th>
                                        <th>Each Image</th>
                                        <th>Each Category</th>
                                        <th>Days To Active </th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
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
@section('custom-js')

@endsection
