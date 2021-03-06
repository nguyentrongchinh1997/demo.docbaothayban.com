@extends('admin.layouts.index')

@section('content')
	<div class="page-content">
		<div class="page-header">
			<div class="page-title">
				<h3>Sửa bài viết</h3>
			</div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="">Trang chủ</a></li>
				<li><a href="#">Sửa bài viết</a></li>
			</ul>
			<div class="visible-xs breadcrumb-toggle">
				<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
			</div>
		</div>
        @if (session('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
        @endif
        @if (count($errors->all()) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
		<div class="panel panel-default">
            <div class="panel-body">
            <form action="{{route('admin.post.edit', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input value="{{$post->title}}" required="required" type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label class="control-label">Hình ảnh cũ</label>
                    <br>
                    <img src='{{asset("upload/thumbnails/$post->image")}}' width="100px">
                    <input type="hidden" name="image_old" value="{{$post->image}}">
                </div>
                <div class="form-group">
                    <label>Hình ảnh mới</label>
                    <input type="file" name="image" class="styled">
                </div>
                <div class="form-group">
                    <label>Chuyên mục</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $cate)
                            <option @if ($cate->id == $post->category_id) {{'selected'}} @endif value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Chuyên mục con</label>
                    <select class="form-control" name="sub_category_id">
                        @foreach ($subCategories as $cate)
                            <option @if ($cate->id == $post->sub_category_id) {{'selected'}} @endif value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Link gốc</label>
                    <input value="{{$post->url_origin}}" type="text" class="form-control" name="url_origin" placeholder="link gốc bài viết">
                </div>
                <div class="form-group">
                    <label>Domain</label>
                    <input value="{{$post->web}}" placeholder="vd: vietnamnet.vn" type="text" class="form-control" name="web">
                </div>
                <div class="form-group">
                    <label>Tên web</label>
                    <input value="{{$post->web_name}}" type="text" class="form-control" name="web_name" placeholder="vd: báo lao động...">
                </div>
                <div class="form-group">
                    <label class="control-label">Từ khóa (nhập và ấn enter)</label>
                    <input value="{{$post->keyword}}" required="required" name="keyword" type="text" id="tags2" class="tags">
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea required="required" name="summury" class="form-control" rows="5" placeholder="Mô tả...">{{$post->summury}}</textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea required="required" name="content" required="required" name="content" id="content-ckeditor" class="form-control ckeditor">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <center>    
                        <button class="btn btn-primary">Hoàn thành</button>
                    </center>
                </div>
            </form>
            </div>
        </div>
	</div>
</div>
@endsection
