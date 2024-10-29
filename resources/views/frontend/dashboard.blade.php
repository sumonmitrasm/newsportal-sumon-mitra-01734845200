@extends('frontend.layout.layout')
@section('content')
<br><br><br><br><br>
<section class="course-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-12">
						<h4>All News ({{$postcount}})</h4>
							<div class="row">
							@foreach($post as $value)
								<div class="col-md-6 col-sm-12">
								
									<!-- Blog Post -->
									<div class="blog grid-blog">
										<div class="blog-image">
										@if(!empty($value['image']))
																	@if (Str::contains($value['image'], 'posts/'))
																		<img src="{{ asset('storage/' . $value['image']) }}" alt="Post Image" >
																	@else
																		<img src="{{ asset('admin/admin_images/post/large/' . $value['image']) }}" alt="Post Image" >
																	@endif
																@else
																	<h2>No Image</h2>
															@endif	
										</div>
										<div class="blog-grid-box">
											<div class="blog-info clearfix">
												<div class="post-left">
													<ul>
														<li>{{$value['created_at']}}</li>
													</ul>
												</div>
											</div>
											<h3 class="blog-title"><a href="#">{{$value->title}}</a></h3>
											<h5 class="blog-title"><a href="#">{{$value->sub_title}}</a></h5>
											<div class="blog-content blog-read">
												<p>{!! $value->description !!}</p>
												<!-- <a href="blog-details.html" class="read-more btn btn-primary">Read More</a> -->
											</div>
										</div>
									</div>
									<!-- /Blog Post -->
									
								</div>
							@endforeach
							</div>

							<!-- Blog pagination -->
							<div class="row">
								<div class="col-md-12">
									<ul class="pagination lms-page">
										<li class="page-item prev">
											<a class="page-link" href="javascript:void(0);" tabindex="-1"><i class="fas fa-angle-left"></i></a>
										</li>
										{{ $post->links() }}
									</ul>
								</div>
							</div>
							<!-- /Blog pagination -->
							
						</div>
						
						<!-- Blog Sidebar -->
						<div class="col-lg-3 col-md-12 sidebar-right theiaStickySidebar">

							<!-- Search -->
							<div class="card search-widget blog-search blog-widget">
								<div class="card-body">
								<form action="{{ route('news.search') }}" method="get">@csrf
										<div class="input-group">
											<input type="text" placeholder="Search..." name="search" id="search" class="form-control">
											<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
										</div>
									</form>
								</div>
							</div>
							<!-- /Search -->

							
						</div>
						<!-- /Blog Sidebar -->
						
					</div>
				</div>
			</section>		
@endsection