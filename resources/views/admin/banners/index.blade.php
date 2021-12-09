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
                    <h1>Banners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
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
    <div class="mt-1">
        <li class="alert alert-success" style="display: none;" id="succ" style="list-style-type:none">Status Updated
            SuccessFully</li>
    </div>
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
                                        <th>Title</th>
                                        <th>Image </th>
                                        <th>Switch </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($banners as $banner)
                                        <tr>

                                            <td>{{ $id++ }}</td>
                                            <td>{{ $banner->title }}
                                            <td><img src="{{ asset('picture/' . $banner->image) }}" alt="User Avatar"
                                                    class="img-size-50 mr-3"></td>
                                            <td >
                                         <div class="custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" name="status" class="custom-control-input" id="{{$banner->id}}"  onChange="test({{ $banner->id }});"
                                                    @if ($banner->status == 1)
                                                checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="{{$banner->id}}"></label>
                                </div>
                                    </td>
                                   
                                    <td id="tes">
                                        <span class="mr-2">
                                            <a href="{{ route('banner.edit', $banner->id) }}"
                                                class="btn btn-primary btn-sm" style="margin-right: 2px">Edit</a>
                                        </span>
                                        <span>
                                            <form method="post" style="margin-left-20;"
                                                action="{{ route('banner.destroy', $banner->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button class="btn  btn-danger btn-sm">Delete</button> --}}
                                            </form>
                                        </span>
                                    </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image </th>
                                        <th>Switch </th>
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

<script>
    function test(id) {

        $.ajax({
            type: "GET",
            url: '{{ route('statusChange', 'id') }}',
            data: {
                'id': id
            },
            success: function() {
                document.getElementById("succ").style.display = "block";
            }
        })
    };
</script>
