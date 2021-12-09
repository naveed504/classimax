@extends('admin.layouts.app')
@section('custom-css')
<link rel="stylesheet" href="{{asset('admin/plugins/dropzone/min/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/dropzone/dropzone.css')}}">
<script src="{{asset('admin/plugins/dropzone/dropzone.js')}}"></script>
<style>
  .dz-button{
    color:black !important;
  }
</style>
@endsection

@section('content')
     <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add Gallery</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
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
                  <h3 class="card-title">Gallery  <small>Add</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
               
                @if(\Session::has('success'))
                <div class="mt-1">
                    <li class="alert alert-success " style="list-style-type:none">{!! \Session::get('success') !!}</li>
                </div>
            @endif
              
                  <div class="card-body">
                  
                 
                    <div class="row">
                     <div class="col-12">
                      <div class="panel-body">
   
                      </div>
                        <label>Image:</label>
                        <div class="panel-body">
                          <form id="dropzoneForm" class="dropzone" action="{{ route('dropzone.upload', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" class="postid"  value="{{$post->id}}">
                          </form>
                          <div align = "center" class="mt-2">
                            <button type="button" class="btn btn-info" id="submit-all">Upload</button>
                          </div>
                        </div>

                      
                          {{-- <div class="input-group">
                              <input type="file" name="image" multiple class="form-control">
                          </div> --}}      
                     </div>
                      
                   </div>
                 
                  </div>
                 <div class="row">
                   <div class="col-12 " style="margin-left: 5px">
                   
                     <div id="imgimage"></div>
                   </div>
                 </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                  </div>
               
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
<script type="text/javascript">

  Dropzone.options.dropzoneForm = {
    autoProcessQueue : false,
    // autoDiscover: false,
    // parallelUploads:10,
    // uploadMultiple:true,
    maxFilesize : 5,
    acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

    init:function(){
      var submitButton = document.querySelector("#submit-all");
      myDropzone = this;

      submitButton.addEventListener('click', function(){
        myDropzone.processQueue();
      });

      this.on("complete", function(){
        if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        {
          var _this = this;
          _this.removeAllFiles();
        }
        load_images();
      });

    }

  };

  load_images();

  function load_images()
  {
      var id = $('.postid').val();
     
    $.ajax({
      url:"{{ route('dropzone.fetch') }}",
      data:{
          'id':id
      },
      
      success:function(data)
      {
        $('#imgimage').html(data);
      }
    })
  }

  $(document).on('click', '.remove_image', function(){
    var name = $(this).attr('id');
    var id = $(this).attr('data-id');
   
    $.ajax({
      url:"{{ route('dropzone.delete') }}",
      data:{name : name , id: id},
      success:function(data){
        load_images();
      }
    })
  });

</script>
@endsection



