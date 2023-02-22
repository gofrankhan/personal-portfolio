@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title">Change Image</h4><hr><hr>
                <form method="post" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $image->id }}">
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Change Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{ asset($image->multi_image) }}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit" herf="{{ route('admin.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light" value="Update Image">
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