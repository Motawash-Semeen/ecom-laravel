
@extends('frontend.main_master')
@section('main_content')
<br><br><div class="body-content m-4">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ Auth::user()->profile_photo_path ? url('upload/profile/' . Auth::user()->profile_photo_path) : asset('upload/profile/no_image.jpg') }}" alt="" class="card-img-top" style="border-radius:50%; margin-bottom:20px" height="100%" width="100%">
                <ul class="list-group list-group-flush">
                    <a href="{{ url('dashboard') }}" class="btn btn-primary btn-sm btn-block @if (request()->is('dashboard')) active @endif">Home</a>
                    <a href="{{ url('profile') }}"  class="btn btn-primary btn-sm btn-block @if (request()->is('profile')) active @endif">Profile Update</a>
                    <a href="{{ url('user-password') }}" class="btn btn-primary btn-sm btn-block @if (request()->is('user-password')) active @endif">Change Password</a>
                    <a href="{{ url('logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-2">
                

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="text-center">
                        @if (request()->is('dashboard'))
                        <h4>Welcome to Dashboard</h4>
                        <h4>{{ Auth::user()->name }}</h4>
                        <h5>{{ Auth::user()->email }}</h5> 
                        @elseif (request()->is('profile'))
                        <h4>Profile Update</h4>
                        @else
                        <h4>Password Update</h4>
                        @endif
                        
                    </div>
                    @if (request()->is('profile'))
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputName">Name
                                    <span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input"
                                    id="exampleInputName" value="{{ $user->name }}">
                                    @error('name')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address
                                    <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail2" value="{{ $user->email }}">
                                    @error('email')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8 col-12">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="profile_photo_path"
                                            class="form-control"
                                            value="{{ $user->profile_photo_path }}">
                                        <div class="help-block"></div>
                                    </div>

                                </div>
                                <div class="form-group col-lg-4 col-12">
                                    <img src="{{ $user->profile_photo_path ? url('upload/profile/' . $user->profile_photo_path) : asset('upload/profile/no_image.jpg') }}"
                                        alt="" id="showImage"
                                        style="width: 100px; height:100px;">

                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                            </div>
                        </form>
                        <br>
                        <br>
                        <br>
                    </div>
                @endif
                    @if (request()->is('user-password'))
                    <div class="card-body">
                        <form action="{{ url('user-password') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="old_password" class="form-control" required=""
                                        data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                </div>
                                @error('old_password')
                                    <div class="form-control-feedback"><small>This field is
                                            <code>required</code></small></div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="new_password" class="form-control" required=""
                                        data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                </div>
                                @error('new_password')
                                    <div class="form-control-feedback"><small>This field is
                                            <code>required</code></small></div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="confirm_password" class="form-control" required=""
                                        data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                </div>
                                @error('confirm_password')
                                    <div class="form-control-feedback"><small>This field is
                                            <code>required</code></small></div>
                                @enderror

                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                            </div>
                        </form>
                        <br>
                        <br>
                        <br>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
