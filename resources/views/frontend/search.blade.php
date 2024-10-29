@extends('frontend.layout.layout')
@section('content')
	<!-- Home Banner -->
			<section class="course-content cart-widget">
				<div class="container">
					<div class="student-widget">
						<div class="student-widget-group">
							<div class="row">
								<div class="col-lg-12">
									<div class="cart-head">
										
									</div>
									<div class="cart-group">
										<div class="row">
                                            @foreach($categorynewsts as $value)
											<div class="col-lg-9 col-md-12 d-flex">
												<div class="course-box course-design list-course d-flex">
													<div class="product">
														<div class="product-img">
															
															<!-- <a href="#">
																<img class="img-fluid" style="wide: 30px;" alt="Img" src="{{ asset('admin/admin_images/post/large/'.$value->image) }}">
															</a> -->
															@if(!empty($value['image']))
																	@if (Str::contains($value['image'], 'posts/'))
																		<img src="{{ asset('storage/' . $value['image']) }}" alt="Post Image" style="width: 80px; height: 50px;">
																	@else
																		<img src="{{ asset('admin/admin_images/post/large/' . $value['image']) }}" alt="Post Image" style="width: 80px; height: 50px;">
																	@endif
																@else
																	<h2>No Image</h2>
															@endif				
														</div>
														<div class="product-content">
															<div class="head-course-title">
																<h3 class="title"><a href="course-details.html">{{$value->title}}</a></h3>
															</div>
															<div class="head-course-title">
																<h3 class="title"><a href="course-details.html">{{$value->sub_title}}</a></h3>
															</div>
															<div class="course-info d-flex align-items-center border-bottom-0 pb-0">
																<p>{!! $value->description !!}</p>
															</div>
															
														</div>
													</div>
												</div>
											</div>
                                            @endforeach
											
											<div class="pagination">
    									
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Home Banner -->		
@endsection