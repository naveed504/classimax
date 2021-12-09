@extends('front.layouts.app')
@include('front.layouts.navbar')
@section('custom-css')

@endsection
@section('content')
<section class="create-list-banner mt-4 text-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-content">
            <div class="overlay float-right mt-2">
              <img
                class="mt-3"
                src="./assets/images/emma-watson.png"
                alt=""
              />
              <p class="">Emma Watson</p>
            </div>
            <h3>Creating Your Premium Listing</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="form-bg py-4 ">
    <div class="container">
      <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white pb-5  p-4">
          <div class="categories pr-4">
            <div class="categories-content ">
              <h2>Premium Ad Settings</h2>
              <p class="mb-1" >The standard listing includes</p>
              <span>1 image,</span>
              <span>1 category</span>
              <div class="border-bottom pt-2"></div>
              <p class="mb-1 py-3">Select the duration for the listing to run</p>
             
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="custom-box text-center" id="textbox1">
                <div class="border-bottom">
                  <div class="pr-5 p-2 pt-3 squared">
                    <input id="checkbox1" type="checkbox" />
                    <label class="pr-1 pt-1" for="">15 days</label>
                  </div>
                </div>
                <p class="pt-3 pr-1">$15</p>
                <p class="totalchecked" style="display: none;">You have selected categories </p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="custom-box text-center" id="textbox2">
                <div class="border-bottom">
                  <div class="pr-5 p-2 pt-3">
                    <input id="checkbox2" type="checkbox" />
                    <label class="pr-1 pt-1" for="">30 days</label>
                  </div>
                </div>
                <p class="pt-3 pr-1">$15</p> 
                <p class="totalchecked" style="display: none;">You have selected categories </p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="custom-box text-center" id="textbox3">
                <div class="border-bottom">
                  <div class="pr-5 p-2 pt-3">
                    <input id="checkbox3" type="checkbox" />
                    <label class="pr-1 pt-1" for="">45 days</label>
                  </div>
                </div>
                <p class="pt-3 pr-1">$15</p> 
                <p class="totalchecked" style="display: none;">You have selected categories </p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="custom-box text-center" id="textbox4">
                <div class="border-bottom">
                  <div class="pr-5 p-2 pt-3">
                    <input id="checkbox4" type="checkbox" />
                    <label class="pr-1 pt-1" for="">60 days</label>
                  </div>
                </div>
                <p class="pt-3 pr-1">$15</p> 
                <p class="totalchecked" style="display: none;">You have selected categories </p>
              </div>
            </div>
          </div>
          <div class="custom-border-bottom  border-bottom pt-4"></div>
          <div class="row pt-3  py-4">
              <div class="col-md-12">
                  <div class="add-additional-image-btn">
                      <button class=" btn btn-danger" data-toggle="modal" data-target="#exampleModal">Add or Remove Images</button>
                  </div>
              </div>
              <div class="col-md-12">

<!-- Modal -->
<div class="modal fade additional-image-modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mb-5">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <h5 class="modal-title" id="exampleModalLabel">Add Photo’s</h5>
          <p>You can include 11 additional images. The primary image will be the thumbnail image shown on the listing page.</p>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form  id="formImageData" enctype="multipart/form-data" method="POST">
         
        @if(\Session::has('success'))
        <div class="mt-1">
            <li class="alert alert-success" style="list-style-type:none">{!! \Session::get('success') !!}</li>
        </div>
        @endif
        <p class="mb-0 primary-heading mt-2 mb-3">Primary Photo</p>
          <ul id="sortable" name="dynamicAddRemove" class="dynamicAddRemove">
              <div class="input-group half half-1 col-md-12 col-sm-12 custom-column addel">
              <span>
                <img class="pr-3" src="{{asset('front/images/drager.png')}}" alt="drage-image" style="margin-top: 37px;;">
              </span>
                <div class="custom-file">
                  <input  type="file" id="images" class="custom-file-input form-control" name="images"  aria-describedby="inputGroupFileAddon04">
                  <label class="custom-file-label" for="inputGroupFile04">Upload Photo</label>
                </div>
                <div class="upload_image col-md-1 col-sm-12 custom-column">
                    <img  id="blah" class="img-fluid ml-3" src="{{asset('front/images/house.png')}}" alt="">
                </div>
                <div class="input-group-append">
                  <i class="far fa-trash-alt custom-trash mt-4 remove-tr" id="inputGroupFileAddon04"></i>
                </div>
                <div class="col-md-12">
                  <div class="maximum-characters additional-images-width-content mt-1">
                    <p class="pl-4">(1200px x 1200px)</p>
                  </div> 
                </div>
              </div>
              
            </ul>
            <div class="row">
              <div class="col-md-6">
                <div class="upload-btn mt-1">
                  <input type="button" class="btn btn-danger" id="add-btn" value="Click to upload more photos" />
                  {{-- <button class="btn btn-danger" id="add-btn">Click to upload more photos</button> --}}
                 </div>
              </div>
            <div class="col-md-6">
              <div class="Return-to-Ad-Settings  mt-2 float-right">
                <button class="btn btn-danger p-2 px-4 py-2">Return to Ad Settings</button>
              </div>
            </div>
            </div>
            
       
            <div class="row mt-5 mb-5">
              <div class="col-md-12">
                <div class="create-list-btn-area ">
                  <a class="btn btn-danger btn-4 float-left">View Post</a>
                  <input type="submit"   class="btn btn-info" value="Save Draft" />
                  {{-- <a class="btn btn-danger btn-3 float-right" id="submit">Save Draft</a> --}}
                </div>
              </div>
            </div>
          </form>
      </div>
   
    </div>
  </div>
</div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox5">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox5" type="checkbox" />
                      <label class="pr-1 pt-1" for="">15 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.30 per image </p>
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox6">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox6" type="checkbox" />
                      <label class="pr-1 pt-1" for="">30 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.60 per image </p> 
                  <small>You have selected (3) images</small>
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox7">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox7" type="checkbox" />
                      <label class="pr-1 pt-1" for="">45 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.90 per image </p> 
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox8">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox8" type="checkbox" />
                      <label class="pr-1 pt-1" for="">60 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$1.20 per image </p> 
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
            </div>
            <div class="custom-border-bottom border-bottom "></div>
            <div class="row pt-3 ">
            
              <div class="col-lg-12">
                  <div class="add-additional-image-btn ">
                      <button class=" btn btn-danger" data-toggle="modal" data-target="#additional-category">Add or Remove Categories</button>
                  </div>
              </div>
              <div class="col-md-12">
                 <!-- Modal -->
<div class="modal fade additional-category-modal " id="additional-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-md-4 col-sm-12"></div>
        <div class="col-md-4 col-sm-12">
          <div class="create-list-form">
            <form class="" action="">
              <div class="list-of-categories">
                <select class="form-control text-gray " style="font-size: 13px; font-weight: 400;">
                    <option>Vahicles</option>
                    <option>14 Days</option>
                    <option>23 Days</option>
                    <option>11 Days</option>
                  </select>
            </div>
             </form>
          </div>
          
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="add-ctgry-btn">
            <button class="btn btn-danger px-4 mt-4 ml-4 ">Add Another Category</button>
          </div>
        </div>
       </div>
    
        <div class="col-md-12 ">
          <div class="text-center mt-5 pb-4">
            <button class="btn btn-primary p-2 px-4" style="border-radius: 5px;">Return to Ad Settings</button>
          </div>
        </div>

            <div class="row mt-5">
              <div class="col-md-12">
                <div class="create-list-btn-area mb-5">
                  <a class="btn btn-danger btn-4 float-left">View Post</a>
                  <a class="btn btn-danger btn-3 float-right">Save Draft</a>
                </div>
              </div>
            </div>
          
      </div>
      
    </div>
  </div>
</div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox9">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox9" type="checkbox" />
                      <label class="pr-1 pt-1" for="">15 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.30 per category</p>
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox10">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox10" type="checkbox" />
                      <label class="pr-1 pt-1" for="">30 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.40 per category</p> 
                  <small>You have selected (3) categories</small>
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox11">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox11" type="checkbox" />
                      <label class="pr-1 pt-1" for="">45 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.60 per category</p> 
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="custom-box text-center" id="textbox12">
                  <div class="border-bottom">
                    <div class="pr-5 p-2 pt-3">
                      <input id="checkbox12" type="checkbox" />
                      <label class="pr-1 pt-1" for="">60 days</label>
                    </div>
                  </div>
                  <p class="pt-3 pr-1">$0.80 per category</p> 
                  <p class="totalchecked" style="display: none;">You have selected categories </p>
                </div>
              </div>
              <div class="col-md-12">
                <div class=" pricing-btn-area mt-5">
                  <a class="btn btn-danger btn-1">Previous Page</a>
                  <a class="btn btn-danger btn-4">My Account</a>
                  <a class="btn btn-danger btn-2 js-btn-tooltip--custom-alt " data-placement="bottom" title=" Warning All changes will be lost, (OK)">Cancel</a>
                  <a class="btn btn-danger btn-6">View Post</a>
                  <a class="btn btn-danger btn-5">Save Draft</a>
                  <a class="btn btn-danger btn-3 ">Post Listing</a>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-1"></div>
       
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){ 
    var postURL = "<?php echo url('add-remove'); ?>";
    

  var i = 1;


$("#add-btn").click(function(){
 
++i;

$('#sortable').append('<div id="r'+i+'" class="input-group half half-1 col-md-12 col-sm-12 custom-column addel"><span><img class="pr-3" src="{{asset("front/images/drager.png")}}" alt="drage-image" style="margin-top: 37px;;"></span><div class="custom-file"><input  name="images" id="images" type="file" class="custom-file-input form-control "  aria-describedby="inputGroupFileAddon04"><label class="custom-file-label" for="inputGroupFile04">Upload Photo</label></div><div class="upload_image col-md-1 col-sm-12 custom-column"><img  id="blah" class="img-fluid ml-3" src="{{asset("front/images/house.png")}}" alt=""></div><div class="input-group-append"><i class="far fa-trash-alt custom-trash mt-4 remove-tr" id="inputGroupFileAddon04"></i></div><div class="col-md-12"><div class="maximum-characters additional-images-width-content mt-1"><p class="pl-4">(1200px x 1200px)</p></div> </div></div>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('div.addel').remove();
});
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#formImageData').on('submit',function(e){
  e.preventDefault();
  // var form = $('form')[0];
  // var file_data = $('#images').prop('files')[0];
  //                       var form_data = new FormData();
  //                       form_data.append('file', file_data);
  var data = new FormData();
  var taskArray = [];
$("input[name=images]").each(function() {

   
   var file_data = $('input[name="images"]')[0].files;
          for (var i = 0; i < file_data.length; i++) {        
            data.append("images[]", file_data[i]);
}
});
// var file_data = $('input[name="images"]')[0].files;
//           for (var i = 0; i < file_data.length; i++) {        
//             data.append("images[]", file_data[i]);
// }
// console.log(taskArray);

  
 


  // var formData = new FormData(this);
 
 $.ajax({
     url: postURL,
     method:"POST",  
    //  data:$('#formImageData').serialize(),
     data:data,
    //  type:'json',
    contentType: false,
    processData: false,
     success:function(data){
         console.log(data);  
                }
 });
});
});
</script>
@endsection

