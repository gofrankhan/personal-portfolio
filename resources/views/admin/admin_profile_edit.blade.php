@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title">Edit Profile Page</h4><hr><hr>
                <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" type="text" id="name" value="{{ $editData->name}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="username" type="text" id="username" value="{{ $editData->username}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" type="email" id="email" value="{{ $editData->email}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="profile_image" type="file" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image)
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