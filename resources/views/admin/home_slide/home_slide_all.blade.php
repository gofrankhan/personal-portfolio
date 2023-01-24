@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title">Home Slider Page</h4><hr><hr>
                <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="title" type="text" id="title" value="{{ $homeslide->title}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="short_title" type="text" id="short_title" value="{{ $homeslide->short_title}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="home_slide" class="col-sm-2 col-form-label">Home Slider</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="home_slide" type="text" id="home_slide" value="{{ $homeslide->home_slide}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="video_url" type="text" id="video_url" value="{{ $homeslide->video_url}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{ (!empty($homeslide->home_slide))? url('upload/home_slide/'.$homeslide->home_slide)
                        :url('upload/no_image.jpeg')}}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit" herf="{{ route('admin.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light" value="Update">
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