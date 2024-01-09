@extends('theme::layouts.app')

@section('content')
 <!-- slider area start -->
<section id="blog_breadcrumb">
    <div class="slider-area breadcrumb" id="blog_breadcrumb_bg_img" style="background-image: url({{ asset(content('blog_breadcrumb','blog_breadcrumb_bg_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area text-center">
                        <h3 id="blog_breadcrumb_title">{{ $blog->title }}</h3>
                        <div class="breadcrump-title">
                            <span id="blog_breadcrumb_des">{{ __('Home') }} / {{ $blog->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- blog main area area -->
<section>
	<div class="blog-section pt-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-blg-details">
						<img class="img-fluid" src="{{ asset($blog->meta->preview) }}" alt="">
						<h2 class="pt-30">{{ $blog->title }}</h2>
						<div class="blog-details">
							<?php echo $blog->post->content; ?>
						</div>
					</div>
					@if($blog->post->comment_status==1)
					<div class="comment-area mt-5">
						<?php echo disquscomment(); ?>
					</div>
					@endif
				</div>
				<div class="col-lg-4">
					<div class="widget search-bar mb-50">
						<h3>Search</h3>
						<form action="{{ route('blog.search') }}" method="POST">
							@csrf
							<div class="searchbar-form">
								<input type="text" placeholder="Search" name="search">
								<button type="submit"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</div>
					<div class="widget recent-post mb-50">
						<h3>Recent post</h3>
						<div class="recent-post">
							@foreach($recent_posts as $post)
							<div class="single-post d-flex mb-20">
								<img  src="{{ asset($post->meta->preview) }}" alt="">
								<a href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a>
							</div>
							@endforeach
						</div>
					</div>
					<div class="widget category-list mb-50">
						<h3>Categories</h3>
						<div class="category-list-menu">
							<nav>
								<ul class="list-group list-group-flush">
									@foreach($categories as $category)
									<li class="list-group-item"><a href="{{ route('category.show',$category->slug) }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</nav>
						</div>
					</div>
					<div class="widget tags-area">
						<h3>Tags</h3>
						<div class="tags-area">
							<nav>
								<ul>
									@php 
									$tags = explode(',', $blog->tags);
									@endphp
									@foreach($tags as $tag)
									<li><a href="{{ route('tag.show',$tag) }}">{{ $tag }}</a></li>
									@endforeach
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- blog main area end -->

<!-- quote area start -->
<section id="blog_quote">
    <div class="quote-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quote-info text-center">
                        <h2 id="blog_quote_title">{{ content('blog_quote','blog_quote_title') }}</h2>
                        <p id="blog_quote_description">{{ content('blog_quote','blog_quote_description') }}</p>
                        <a href="{{ url('contact') }}" id="blog_quote_button">{{ content('blog_quote','blog_quote_button') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- quote area end -->

<input type="hidden" id="count_url" value="{{ route('post.view') }}">
<input type="hidden" id="post_id" value="{{ $blog->id }}">

<!-- band area start -->
@php
$basic_info=LpOption('system_basic_info');

@endphp
@if(!empty($basic_info->gallary_input))
@php
$gallery=explode(',', $basic_info->gallary_input);

@endphp
<!-- band area start -->
<section id="band">
    <div class="band-area pt-100 pb-100">
        <div class="container">
            <div class="row owl-carousel2 owl-carousel">


                @foreach($gallery as $row)
                <div class="col-lg-12">
                    <div class="band-img">
                     <img id="band_first_img" src="{{ asset($row) }}" alt="">
                 </div>
             </div>
             @endforeach

         </div>
     </div>
 </div>
</section>
@endif
<!-- band area end -->
<!-- band area end -->
@endsection