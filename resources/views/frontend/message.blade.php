@extends('frontend.layout.layout')
@section('content')
<!-- Breadcrumb -->
<div class="page-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-12">
							<h1 class="mb-0">Support</h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Help Details -->
			<div class="page-content">
				
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-8 mx-auto">
							<div class="support-wrap">
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
								<h5>Submit a Issue</h5>
								<form  action="{{ route('issue-submit') }}" method="post">@csrf
							  @if(!empty($tickets['id']))
								<div class="input-block">
										<label>Post Id</label>
										<input type="hidden" name="post_id" class="form-control" value="{{ $tickets['id'] }}">
									</div>
									@endif
									<div class="input-block">
										<label>Name</label>
										<input type="text" name="name" class="form-control" placeholder="Enter your Name">
									</div>
									<div class="input-block">
										<label>Email</label>
										<input type="text" name="email" class="form-control" placeholder="Enter your email address">
									</div>
									<div class="input-block">
										<label>Mobile</label>
										<input type="tel" name="mobile" class="form-control" placeholder="Enter your Mobile Number">
									</div>
									<div class="input-block">
										<label>Subject</label>
										<input type="text" name="subject" class="form-control" placeholder="Enter your Subject">
									</div>
									<div class="input-block">
										<label>Description</label>
										<textarea class="form-control" name="description" placeholder="Write down here" rows="4"></textarea>
									</div>
									<button class="btn btn-submit">Submit</button>
								</form>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- /Help Details -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection