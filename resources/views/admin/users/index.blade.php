@extends('admin.layouts.app')
@section('custom-css')

@endsection
<style>
  #tes{
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
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
     <!-- Main content -->
     @if(\Session::has('success'))
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
                      <th>Name</th>
                      <th>Email </th>
                      <th>Action</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                        @php
                       
                            $id = 1;
                        @endphp
                        @foreach ($users as $user)
                        {{-- {{dd($category->parents)}} --}}
                        <tr>

                            <td>{{$id++}}</td>
                            <td>{{$user->name}}
                            </td>
                          <td>{{$user->email}}</td>

                            <td id="tes"> 
                              <span class="mr-2">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm" style="margin-right: 2px">Edit</a>
                              </span>
                               <span> 
                                  <form method="post" style="margin-left-20;" action="{{route('user.destroy', $user->id)}}">
                                    @csrf
                                    {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn  btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                  </form>
                                </span>
                            </td> 
                          </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@section('custom-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
  $('.show_confirm').click(function(event) {
       var form =  $(this).closest("form");
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
