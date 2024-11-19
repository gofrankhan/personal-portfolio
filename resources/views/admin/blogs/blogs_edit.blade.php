@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Blog</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form method="post" action="{{ route('update.blogs') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name='id' value="{{ $blogs->id}}">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach($category as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $blogs->blog_category_id ? 'selected' : '' }}>{{ $cat->blog_category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="row mb-3">
                        <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="blog_title" type="text" id="blog_title" value="{{ $blogs->blog_title}}">
                            @error('blog_title')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="blog_tags" class="col-sm-2 col-form-label">Blog Tags</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="blog_tags" type="text" id="blog_tags" value="{{ $blogs->blog_tags}}" data-role="tagsinput">
                            @error('blog_tags')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                   

                    <div class="row mb-3">
                        <label for="blog_description" class="col-sm-2 col-form-label">Blog Description</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="blog_description">{{ $blogs->blog_description}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="blog_image" type="file" id="blog_image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="portfolio_image" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{ asset($blogs->blog_image)}}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light" value="Update Blog Data">
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection