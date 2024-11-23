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
                    <h4 class="mb-sm-0">Setup Footer</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form method="post" action="{{ route('update.footer') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="number" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="number" type="text" id="number" value="{{ $footer_all->number}}">
                            @error('number')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="short_description">{{ $footer_all->short_description}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="address" type="text" id="address" value="{{ $footer_all->address}}">
                            @error('address')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" type="text" id="email" value="{{ $footer_all->email}}">
                            @error('email')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="facebook" type="text" id="facebook" value="{{ $footer_all->facebook}}">
                            @error('facebook')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="twitter" type="text" id="twitter" value="{{ $footer_all->twitter}}">
                            @error('twitter')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="copyright" type="text" id="copyright" value="{{ $footer_all->copyright}}">
                            @error('copyright')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <input type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light" value="Update Footer Information">
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