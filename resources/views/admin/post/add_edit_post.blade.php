@extends('admin.layout.layout')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function () {
       var selDiv = $("#selectedBannerimages");
       var storedFiles = [];
   
       $("#img1").on("change", handleFileSelect);
   
       function handleFileSelect(e) {
           var files = e.target.files;
           var filesArr = Array.prototype.slice.call(files);
   
           filesArr.forEach(function (f) {
               if (!f.type.match("image.*")) {
                   return;
               }
               storedFiles.push(f);
   
               var reader = new FileReader();
               reader.onload = function (e) {
                   var html =
                       '<img src="' +
                       e.target.result +
                       '" data-file="' +
                       f.name +
                       '" alt="Category Image1" height="150px" width="150px" style="border-radius: 10px;">';
                   selDiv.html(html);
               };
               reader.readAsDataURL(f);
           });
       }
   });
</script>
<style>
   #container {
   width: 1000px;
   margin: 20px auto;
   }
   .ck-editor__editable[role="textbox"] {
   /* editing area */
   min-height: 100px;
   }
   .ck-content .image {
   /* block images */
   max-width: 80%;
   margin: 20px auto;
   }
</style>
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">{{ $title }}</h4>
            </div>
            <div class="page-rightheader ms-auto d-lg-flex d-none">
            </div>
         </div>
         <!--End Page header-->
         <!-- Row -->
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               @if ($errors->any())
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                  <strong>Error Message: </strong>{{ $error }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <br>
                  @endforeach
               </div>
               @endif
               @if(Session::has('error_message'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error Message: </strong>{{Session::get('error_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif
               @if(Session::has('success_message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success Message: </strong>{{Session::get('success_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif
            </div>
            <form id="someElementId" class="forms-sample"  @if (empty($post['id']))
            action="{{ route('add-edit-post') }}"
            @else
            action="{{ route('add-edit-post', ['id' => $post['id']]) }}"
            @endif method="post" enctype="multipart/form-data">@csrf

            <div class="row">
               <div class="col-xl-8 col-lg-7">
                  <div class="card ">
                     <div class="card-body other-fieldxxx">
                        <div class="row">
                           <div class="col-sm-8 col-md-8">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Title<span style="color:red">*</span></label>
                                 <input type="text" class="form-control" id="title" name="title"
                                 @if (!empty($post['title'])) value="{{ $post['title'] }}" @else value="{{ old('title') }}" @endif
                                 placeholder="Enter title">
                              </div>
                           </div>
                           <div class="col-sm-8 col-md-8">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Sub Title<span style="color:red">*</span></label>
                                 <input type="text" class="form-control" id="sub_title" name="sub_title"
                                 @if (!empty($post['sub_title'])) value="{{ $post['sub_title'] }}" @else value="{{ old('sub_title') }}" @endif
                                 placeholder="Enter Sub title">
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-12" id="container">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Description<span style="color:red">*</span></label>
                                 <textarea id="editor" name="description">@if(!empty($post['description'])){{$post['description']}}@else{{old('description')}}@endif</textarea>
                              </div>
                              <p id="post-description"></p>
                           </div>
                           <div id="selectedBannerimages"></div>
                           <div class="mb-3">
                              <label for="pwd" class="form-label">Image << ||>> <span style="color:darkcyan"> Recommended Image Size: Width:768px; Height:432px</span></label>
                              <input id="img1" type="file" class="form-control" id="image1" name="image">
                              @if (!empty($post['image']))
                              <div>
                                 <img style="width: 80px; height: 50px; margin-top: 5px;" src="{{ asset('admin/admin_images/post/large/' . $post['image']) }}" alt=""> &nbsp;
                                 <a target="_blank" href="{{ asset('admin/admin_images/post/large/' . $post['image']) }}"> <span style="color:green">Click Here</span></a> &nbsp;&nbsp;
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12">
               <div class="card-footer text-center">
                  <div class="btn-list">
                     <button type="submit" class="btn btn-primary mt-4 mb-0">Post Data</button>
                  </div>
               </div>
            </div>
         </div>
         </form>
      </div>
      <!-- End Row-->
   </div>
</div>
</div>
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection