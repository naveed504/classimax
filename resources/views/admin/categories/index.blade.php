@extends('admin.layouts.app')
@section('custom-css')
<style>
  #tes{
    display: flex
  }
</style>
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
                      <th>Parent Category </th>
                      <th>Action</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                        @php
                       
                            $id = 1;
                        @endphp
                        @foreach ($categories as $category)
                        {{-- {{dd($category->parents)}} --}}
                        <tr>

                            <td>{{$id++}}</td>
                            <td>{{$category->name}}
                            </td>
                          @if (isset($category->parent->name))
                          <td>{{$category->parent->name}}</td>
                          @else
                          <td>No Parent</td>
                          @endif
                            
                     
                          
                            
                            <td id="tes">
                              <span>
                              <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm" style="margin-right: 2px">Edit</a>
                              </span> 
                               <span> 
                                 <form method="post" style="margin-left-20;" action="{{ route('category.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  btn-danger btn-sm show_confirm">Delete</button>
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
                      <th>Parent Category</th>
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