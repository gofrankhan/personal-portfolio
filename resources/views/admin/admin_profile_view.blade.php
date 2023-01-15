@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image)
                        :url('upload/no_image.jpeg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Username : {{ $adminData->username}}</h4><hr>
                        <h4 class="card-title">Full Name: {{ $adminData->name }}</h4><hr>
                        <h4 class="card-title">Email    : {{ $adminData->email }}</h4>
                    </div>
                </div>
                <a href="{{ route('edit.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection