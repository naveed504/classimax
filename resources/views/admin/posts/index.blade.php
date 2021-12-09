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
                    <h1>Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Posts</li>
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
                                        <th>Category </th>
                                        <th>Price</th>
                                        <th>Expiration-Date </th>
                                        <th>Active/Inactive </th>
                                        <th>Image </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        
                                        $id = 1;
                                    @endphp

                                    @foreach (@$posts as $post)
                                        @if (auth()->user()->id == $post->user_id or
                                                 auth()->user()->hasRole('Admin'))
                                            <tr>
                                                <td>{{ $id++ }}</td>
                                                <td>{{ $post->title }}
                                                </td>
                                                @if (isset($post->category->name))
                                                    <td>{{ $post->category->name }}</td>

                                                @else
                                                    <td>No Parent</td>
                                                @endif
                                                <td>{{ $post->price }}</td>
                                                <td>{{ $post->expire_date }}</td>
                                                <td>
                                                    <div
                                                        class="custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" name="status" class="custom-control-input"
                                                            id="{{ $post->id }}" onChange="test({{ $post->id }});"
                                                            @if ($post->status == 1)
                                                              checked
                                                            @endif
                                                            >
                                                            <label class="custom-control-label" for="{{ $post->id }}"></label>
                                                         </div>
                                                </td>
                        <td><img src="{{ asset('picture/' . $post->image) }}" alt="User Avatar" width="90" height="60"
                                class="mr-3"></td>

                        <td id="tes">
                            <span class="mr-2">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm"
                                    style="margin-right: 2px">Edit</a>
                            </span>
                            <span class="mr-2">
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-success btn-sm"
                                    style="margin-right: 2px">Add
                                    Gallery</a>
                            </span>
                            <span class="mr-2">
                                <a href="{{ route('post.reports', $post->id) }}" class="btn btn-success btn-sm"
                                    style="margin-right: 2px">View
                                    Reports</a>
                            </span>
                            <span>
                                <form method="post" style="margin-left-20;"
                                    action="{{ route('post.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  btn-danger btn-sm show_confirm">Delete</button>
                                </form>
                            </span>
                        </td>
                        </tr>
                        @endif
                        {{-- {{dd($category->parents)}} --}}

                        @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Parent Category</th>
                                <th>Price</th>
                                <th>Expiration-date</th>
                                <th>Active/Inactive</th>
                                <th>Feature Image</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            //  var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection

<script>
    function test(id) {
        
        $.ajax({
            type: "GET",
            url: '{{ route('poststatusChange', 'id') }}',
            data: {
                'id': id
            },
            success: function() {
                document.getElementById("succ").style.display = "block";
            }
        })
    };
</script>
