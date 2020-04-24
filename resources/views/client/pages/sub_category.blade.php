@extends('client.layouts.index')

@section('title', 'Tin tức ' . $subCategory->name . ' - ' . $subCategory->category->name)

@section('content')
	<div class="page-title" style="margin: 0px">
{{-- 		<div class="row" style="background: #f1f9ff">
			<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px">
					<ol class="breadcrumb breadcrumb-custom">
						<li class="active">
							<a style="text-transform: capitalize; color: #c90000" href="{{ route('client.category', ['slug' => $subCategory->category->slug]) }}">
								{{ $subCategory->category->name }}
							</a>
						</li>
						@foreach ($subCategory->category->subCategory as $subCate)
							<li>
								<a style="text-transform: capitalize;" href="{{ route('client.sub_cate', ['cate' => $subCate->category->slug, 'sub_cate' => $subCate->slug]) }}">
									{{ $subCate->name }}
								</a>
							</li>
						@endforeach
					</ol>
				</div>
			</div>
		</div> --}}
		<div class="container">
			<div class="row" style="margin-top: 10px">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ol class="breadcrumb breadcrumb-custom breadcrumb-custom-sub" style="float: left;">
						<li class="active">
							<a style="color: #c90000" href="{{ route('client.category', ['slug' => $subCategory->category->slug]) }}">{{ $subCategory->category->name }}</a>
						</li>
						@foreach ($subCategory->category->subCategory as $subCate)
							<li>
								<a style="text-transform: capitalize; color:@if ($subCate->slug == $subCategory->slug){{'#c90000'}}@else{{'#6c757d'}}@endif" href="{{ route('client.sub_cate', ['cate' => $subCate->category->slug, 'sub_cate' => $subCate->slug]) }}">
									{{ $subCate->name }}
								</a>
							</li>
						@endforeach
					</ol>
				</div>
			</div>
		</div>
	</div>
	<main class="page_main_wrapper">
		{{-- <section class="slider-inner">
			<div class="container">
				<div class="row thm-margin">
					<div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
						<div class="slider-wrapper">
							<div id="owl-slider" class="owl-carousel owl-theme">
								@foreach ($postSlides as $post)
									<!-- Slider item one -->
									<div class="item">
										<div class="slider-post post-height-1">
											<a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}" class="news-image">
												<img data-src='{{asset("upload/og_images/$post->image")}}' alt="{{ $post->title }}" class="lazy img-responsive">
											</a>
											<div class="post-text">
												<h2 title="{{ $post->title }}">
													<a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}">
														{{ $post->title }}
													</a>
												</h2>
												<ul class="authar-info">
													<li class="date">{{ getWeekday($post->date) }}, {{ date('H:i d/m/Y', strtotime($post->date)) }}</li>
												</ul>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
						<div class="row slider-right-post thm-margin">
							@foreach ($postTop as $post)
								<div class="col-xs-6 col-sm-6 col-md-6 thm-padding">
									<div class="slider-post post-height-2">
										<a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}" class="news-image">
											<img src='{{asset("upload/og_images/$post->image")}}' alt="{{ $post->title }}" class="img-responsive">
										</a>
										<div class="post-text">
											<h4><a href="#">{{ $post->title }}</a></h4>
											<ul class="authar-info">
												<li class="hidden-xs">{{ date('d/m/Y', strtotime($post->date)) }}</li>
											</ul>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section> --}}
		<div class="container">
			<div class="row row-m">
				<div class="col-sm-8 col-p">
					@if (!empty($postSlide))
						<div class="row" style="margin-bottom: 20px">
		                    <div class="col-md-7">
		                    	<a href="{{ route('client.detail', ['category' => $postSlide->subCategory->slug, 'title' => $postSlide->slug, 'id' => $postSlide->id]) }}">
		                    		<img width="100%" alt="{{$postSlide->title}}" src='{{asset("upload/og_images/$postSlide->image")}}'>
		                    	</a>
		                    </div>
		                    <div class="col-md-5">
		                        <h2 style="margin-top: 0px; line-height: 20px">
		                            <a href="{{ route('client.detail', ['category' => $postSlide->subCategory->slug, 'title' => $postSlide->slug, 'id' => $postSlide->id]) }}" style="font-size: 20px">
		                                {{ $postSlide->title }}
		                            </a>
		                        </h2>
		                        <p class="summury">
		                            {{ $postSlide->summury }} 
		                        </p>
		                        <p class="date">
		                            {{ date('d/m/Y H:i', strtotime($postSlide->date)) }} GMT+7
		                        </p>
		                        <p>
		                            <a class="sub-category" href="{{ route('client.sub_cate', ['cate' => $postSlide->category->slug, 'sub_cate' => $postSlide->subCategory->slug]) }}">{{ $postSlide->subCategory->name }}</a> | <a href="{{ route('client.news_soure', ['web' => $postSlide->web]) }}" class="soure">{{ $postSlide->web }}</a>
		                        </p>
		                    </div>
		                </div>
	                @endif
	                <div class="row" style="margin-bottom: 20px">
	                    <div class="col-sm-12">
	                        <div class="featured-inner" style="padding: 0px">
	                            <div id="featured-owl" class="owl-carousel">
	                                @foreach ($postTop as $post)
	                                    <div class="item">
	                                        <div class="featured-post">
	                                            <a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}" class="news-image">
	                                                <img title="{{$post->title}}" src='{{asset("upload/og_images/$post->image")}}' alt="{{$post->title}}" class="img-responsive" style="height: 100px; object-fit: cover; width: 100%">
	                                            </a>
	                                            <h4>
	                                                <a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}">
	                                                    {{ $post->title }}
	                                                </a>
	                                            </h4>
	                                            <p>
	                                                <a class="sub-category" href="{{ route('client.sub_cate', ['cate' => $post->category->slug, 'sub_cate' => $post->subCategory->slug]) }}">{{ $post->subCategory->name }}</a> | 
	                                                <a class="soure" href="{{ route('client.news_soure', ['web' => $post->web]) }}">{{ $post->web }}</a>
	                                            </p>
	                                        </div>
	                                    </div>
	                                @endforeach
	                                
	                            </div>
	                        </div>
	                    </div>
	                </div>
					<div class="theiaStickySidebar">
						@if (count($postList) > 0)
						<div class="post-inner categoty-style-1">
							<div class="post-body" style="padding: 15px 15px 15px 0px">
								@foreach ($postList as $post)
									<div class="news-list-item articles-list">
                                        <div class="img-wrapper">

                                            <a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}" class="thumb">
                                            	<img data-src="{{ asset("upload/thumbnails/$post->image") }}" alt="{{ $post->title }}" class="lazy img-responsive"></a>
                                        </div>
                                        <div class="post-info-2">
                                            <h4 title="{{ $post->title }}"><a href="{{ route('client.detail', ['category' => $post->subCategory->slug, 'title' => $post->slug, 'id' => $post->id]) }}" class="title">{{ $post->title }}</a></h4>
                                            <ul class="authar-info">
                                                <li><i class="ti-timer"></i> {{ getWeekday($post->date) }}, {{ date('H:i d/m/Y', strtotime($post->date)) }}</li>
                                            </ul>
                                            <p class="hidden-sm description" style="margin-bottom: 10px">{{ $post->summury }}</p>
                                            <p style="margin-bottom: 0px;">
												<a class="soure" href="{{ route('client.news_soure', ['web' => urlencode($post->web)]) }}">{{ $post->web }}</a>
											</p>
                                        </div>
                                    </div>
                                @endforeach
							</div>
							<!-- Post footer -->
							<div class="post-footer" style="border-top: 0px"> 
								<div class="row thm-margin">
									<div class="col-xs-12 col-sm-12 col-md-12 thm-padding">
										{{ $postList->links() }}
									</div>
								</div>
							</div> <!-- /.Post footer-->
						</div>
						@endif
					</div>
				</div>
					<!-- END OF /. MAIN CONTENT -->
					<!-- START SIDE CONTENT -->
					<div class="col-sm-4 col-p sidebar" style="padding: 5px">
						<div class="theiaStickySidebar">
							<!-- START SOCIAL ICON -->
							@include('client.includes.weather')
							<!-- END OF /. SOCIAL ICON -->
							<!-- START ADVERTISEMENT -->
							<div class="add-inner">
								<img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
							</div>
							<!-- END OF /. ADVERTISEMENT -->
							<!-- START NAV TABS -->
							@include('client.includes.best_view')
							<!-- END OF /. NAV TABS -->
						</div>
					</div>
					<!-- END OF /. SIDE CONTENT -->
				</div>
		</div>
	</main>
<input type="hidden" class="input" id="{{$subCategory->category->slug}}{{$subCategory->category->id}}" value="{{$subCategory->category->id}}">
@endsection
