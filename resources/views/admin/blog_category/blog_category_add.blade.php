@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Blog Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{ route('store.blog.category') }}" >
                        @csrf
                        <div class="row mb-3">
                            <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="blog_category" type="text" id="blog_category" value="">
                                @error('blog_category')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <input type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light" value="Insert Blog Category">
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