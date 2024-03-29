@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Page') }}</h4>
				<div class="alert alert-danger none errorarea">
					<ul id="errors">

					</ul>
				</div>
				<form method="post" id="basicform" action="{{ route('admin.page.update',$info->id) }}">
					@csrf
					@method('PUT')
					<div class="custom-form pt-20">
						<div class="form-group">
							<label for="name">{{ __('Page Title') }}</label>
							<input type="text" placeholder="Page Title" class="form-control" name="title" id="name" value="{{ $info->title }}">
						</div>
						<div class="form-group">
							<label for="slug">{{ __('Page Slug') }}</label>
							<input type="text" placeholder="Page Title" class="form-control" name="slug" id="slug" value="{{ $info->slug }}">
						</div>
						<div class="form-group">
							<label for="content">{{ __('Meta Description') }}</label>
							<textarea name="excerpt" class="form-control" maxlength="400" cols="30" rows="5" placeholder="Meta Descriptionn" id="description">{{ $info->meta->excerpt }}</textarea>
						</div>
						<div class="form-group">
							<label for="content">{{ __('Page Content') }}</label>
							<textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content" id="content"><?php echo $info->post->content; ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4>{{ __('Search Engine Optimization') }}</h4>
					<div class="search-engine">
						<h6 class="pt-15 page-title-seo" id="seotitle">{{ $info->title }}</h6>
						<a href="#" class="text-success" id="seourl">{{ url('/').'/page/'.$info->slug }}</a>
						<p id="seodescription">{{ $info->meta->excerpt }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="single-area">
				<div class="card">
					<div class="card-body">
						<h5>{{ __('Publish') }}</h5>
						<hr>
						<div class="btn-publish">
							<button type="submit" class="btn btn-save"><i class="fa fa-save"></i> {{ __('Update') }}</button>
							
						</div>
					</div>
				</div>
			</div>
			<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<h5>{{ __('Status') }}</h5>
						<hr>
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
							<option selected value="1" @if($info->status==1) selected="" @endif>{{ __('Published') }}</option>
							<option value="2" @if($info->status==2) selected="" @endif>{{ __('Draft') }}</option>
							
						</select>
					</div>
				</div>
			</div>
			<?php echo adminLang($info->lang); ?>
			<div class="single-area">
				<div class="card sub">
					<div class="card-body">
						<h5>{{ __('Meta Tags') }}</h5>
						<hr>
						<input type="text" name="tags" id="tags" placeholder="Enter tags" value="{{ $info->tags }}">
					</div>
				</div>
			</div>
		</div>
		

		<input type="hidden" name="type" value="1">
		<input type="hidden"  name="post_type" value="page">
	</form>
	
	@endsection

	@section('script')
	<script src="{{ asset('admin/js/summernote.min.js') }}"></script>
	<script src="{{ asset('admin/js/custom-summernote.min.js') }}"></script>
	<script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('admin/js/form.js') }}"></script>

	<script>
 $('#tags').tagsinput();
//error response will assign this function
function errosresponse(xhr){
	$("#errors").html("<li class='text-danger'>"+xhr.responseJSON[0]+"</li>")
} 

</script>
@endsection