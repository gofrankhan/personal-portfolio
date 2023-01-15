@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title">Change Password Page</h4><hr><hr>

                @if(count($errors))
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                    @endforeach
                @endif

                <form method="post" action="{{ route('update.password') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="oldpassword" type="password" id="oldpassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="newpassword" type="password" id="newpassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="confirm_password" type="password" id="confirm_password">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" value="Change Password">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection