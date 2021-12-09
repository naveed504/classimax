@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header shadow">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Reports</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(\Session::has('success'))
    <div class="mt-1">
        <li class="alert alert-success" style="list-style-type:none">{!! \Session::get('success') !!}</li>
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row shadow">
                <div class="col-12">
                    <br>
                    {{-- <h3 class="mt-1">Post Title: {{$post->title}}</h3><br> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>ID</th>
                                {{-- <th>Report ID</th> --}}
                                <th>User ID</th>
                                <th>Report</th>
                                <th>Action</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                                @php
                               
                                    $id = 1;
                                @endphp
                                @foreach ($reports as $report)
                                {{-- {{dd($category->parents)}} --}}
                                <tr>
        
                                    <td>{{$id++}}</td>
                                    {{-- <td>{{$report->id}}</td> --}}
                                    <td>{{$report->user->name}}</td>
                                  
                                  <td>{{$report->description}}</td>
        
                                    <td id="tes"> 
                                      
                                       <span> 
                                          <form method="post" style="margin-left-20;" action="{{ route('report.delete', $report->id) }}">
                                            @csrf
                                           
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
                              {{-- <th>Report ID</th> --}}
                              <th>User ID</th>
                              <th>Report</th>
                              <th>Action</th>
                              
                            </tr>
                            </tfoot>
                          </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
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

