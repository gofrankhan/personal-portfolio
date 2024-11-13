@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title">Add Portfolio</h4><hr><hr>
                <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="portfolio_name" type="text" id="portfolio_name" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="portfolio_title" type="text" id="portfolio_title" value="">
                        </div>
                    </div>
                   

                    <div class="row mb-3">
                        <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio Description</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="portfolio_description"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="portfolio_image" type="file" id="portfolio_image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="portfolio_image" class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" name="showImage" id="showImage" src="{{url('upload/no_image.jpeg')}}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light" value="Insert Portfolio Data">
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