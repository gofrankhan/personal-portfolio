@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Multi Image</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form method="post" action="{{ route('store.multi.image') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="multi_image" class="col-sm-2 col-form-label">Add Multi Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="multi_image[]" type="file" id="multi_image" multiple="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{ (!empty($aboutpage->about_image))? url($aboutpage->about_image)
                        :url('upload/no_image.jpg')}}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit" herf="{{ route('admin.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light" value="Add Multi Image">
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