@extends('admin.layout.layout')
@section('content')

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
            <form id="someElementId" class="forms-sample"  @if (empty($admin['id']))
            action="{{ route('addeditadmin') }}"
            @else
            action="{{ route('addeditadmin', ['id' => $admin['id']]) }}"
            @endif method="post" enctype="multipart/form-data">@csrf

            <div class="row">
               <div class="col-xl-8 col-lg-7">
                  <div class="card ">
                     <div class="card-body other-fieldxxx">
                        <div class="row">
                           <div class="col-sm-8 col-md-8">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Name <span style="color:red">*</span></label>
                                 <input type="text" class="form-control" id="name" name="name"
                                 @if (!empty($admin['name'])) value="{{ $admin['name'] }}" @else value="{{ old('name') }}" @endif
                                 placeholder="Enter name">
                              </div>
                           </div>
                           <div class="col-sm-8 col-md-8">
                            <div class="mb-3">
                                <label for="userType" class="form-label fw-bold">Type <span style="color: red;">*</span></label>
                                <select id="userType" name="type" style="color: black;" class="form-select">
                                <option value="">Select</option>
                                <option value="admin" @if(!empty($admin['type']) && $admin['type']=="admin") selected="" @endif>Admin</option>
                                <option value="editor" @if(!empty($admin['type']) && $admin['type']=="editor") selected="" @endif>Editor</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-sm-8 col-md-8">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Mobile <span style="color:red">*</span></label>
                                 <input type="text" class="form-control" id="mobile" name="mobile"
                                 @if (!empty($admin['mobile'])) value="{{ $admin['mobile'] }}" @else value="{{ old('mobile') }}" @endif
                                 placeholder="Enter mobile">
                              </div>
                           </div>
                           <div class="col-sm-8 col-md-8">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Email <span style="color:red">*</span></label>
                                 <input type="email" class="form-control" id="email" name="email"
                                 @if (!empty($admin['email'])) value="{{ $admin['email'] }}" @else value="{{ old('email') }}" @endif
                                 placeholder="Enter email">
                              </div>
                           </div>
                           <div class="col-sm-8 col-md-8">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Password <span style="color:red">*</span></label>
                                 <input type="password" class="form-control" id="password" name="password"
                                 placeholder="Enter password">
                              </div>
                           </div>
                           <div class="col-sm-8 col-md-8">
                           <div class="mb-3">
                            <label for="description" class="form-label">Description <span style="color:red">*</span></label>
                            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter your description here...">
                                {{ !empty($admin['description']) ? $admin['description'] : old('description') }}
                            </textarea>
                            </div>

                           <div class="mb-3">
                              <label for="pwd" class="form-label">Image << ||>> <span style="color:darkcyan"> Recommended Image Size: Width:768px; Height:432px</span></label>
                              <input id="img1" type="file" class="form-control" id="image1" name="image">
                              @if (!empty($admin['image']))
                              <div>
                                 <img style="width: 80px; height: 50px; margin-top: 5px;" src="{{ asset('admin/admin_images/large/' . $admin['image']) }}" alt=""> &nbsp;
                                 <a target="_blank" href="{{ asset('admin/admin_images/large/' . $admin['image']) }}"> <span style="color:green">Click Here</span></a> &nbsp;&nbsp;
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