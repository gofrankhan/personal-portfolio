@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title">About Page</h4><hr><hr>
                <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="title" type="text" id="title" value="{{ $aboutpage->title}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="short_title" type="text" id="short_title" value="{{ $aboutpage->short_title}}">
                        </div>
                    </div>
                   

                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" type="text" id="short_description">{{ $aboutpage->short_description}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="long_description">{{ $aboutpage->long_description}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="about_image" type="file" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{ (!empty($aboutpage->about_image))? url($aboutpage->about_image)
                        :url('upload/no_image.jpeg')}}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit" herf="{{ route('admin.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light" value="Update About Page">
                </form>
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