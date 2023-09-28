{{-- 
@extends('frontend.main_master')
@section('main_content')
<br><br><div class="body-content m-4">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ Auth::user()->profile_photo_path ? url('upload/profile/' . Auth::user()->profile_photo_path) : asset('upload/profile/no_image.jpg') }}" alt="" class="card-img-top" style="border-radius:50%; margin-bottom:20px" height="100%" width="100%">
                <ul class="list-group list-group-flush">
                    <a href="#" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ url('profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="#" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ url('logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="text-center">
                        <h4>Welcome to Dashboard</h4>
                        <h4>{{ Auth::user()->name }}</h4>
                        <h5>{{ Auth::user()->email }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}