@extends('admin.admin_master')
@section('admin_content')
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4">

                <div class="box box-inverse bg-img"
                    style="background-image: url({{ asset('backend') }}/images/gallery/full/1.jpg);" data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler toggler-danger text-white">
                            <input type="checkbox">
                            <i class="fa fa-heart"></i>
                        </label>
                        <div class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-picture-o"></i> Shots</a>
                                <a class="dropdown-item" href="#"><i class="ti-check"></i> Follow</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered"
                                src="{{ $adminData->profile_photo_path ? url('upload/profile/' . $adminData->profile_photo_path) : asset('upload/profile/no_image.jpg') }}"
                                alt="">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $adminData->name }}</a>
                        </h4>
                        <span><i class="fa fa-map-marker w-20"></i> Miami</span>
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                            <span class="opacity-60">Followers</span><br>
                            <span class="font-size-20">8.6K</span>
                        </li>
                        <li>
                            <span class="opacity-60">Following</span><br>
                            <span class="font-size-20">8457</span>
                        </li>
                        <li>
                            <span class="opacity-60">Tweets</span><br>
                            <span class="font-size-20">2154</span>
                        </li>
                    </ul>
                </div>

                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray pl-10">{{ $adminData->email }}</span> </p>
                                    <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
                                    <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pb-15">
                                    <p class="mb-10">Social Profile</p>
                                    <div class="user-social-acount">
                                        <button class="btn btn-circle btn-social-icon btn-facebook"><i
                                                class="fa fa-facebook"></i></button>
                                        <button class="btn btn-circle btn-social-icon btn-twitter"><i
                                                class="fa fa-twitter"></i></button>
                                        <button class="btn btn-circle btn-social-icon btn-instagram"><i
                                                class="fa fa-instagram"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <div class="map-box">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329"
                                            width="100%" height="100" frameborder="0" style="border:0"
                                            allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-12 col-lg-7 col-xl-8">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Profile Informaion</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form novalidate="" method="POST" action="{{ url('admin/profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required=""
                                                        data-validation-required-message="This field is required"
                                                        value="{{ $adminData->name }}">
                                                    <div class="help-block"></div>
                                                </div>
                                                @error('name')
                                                    <div class="form-control-feedback"><small>This field is
                                                            <code>required</code></small></div>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control"
                                                        required=""
                                                        data-validation-required-message="This field is required"
                                                        value="{{ $adminData->email }}">
                                                    <div class="help-block"></div>
                                                </div>
                                                @error('email')
                                                    <div class="form-control-feedback"><small>This field is
                                                            <code>required</code></small></div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-8 col-12">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="profile_photo_path"
                                                            class="form-control" required=""
                                                            value="{{ $adminData->profile_photo_path }}">
                                                        <div class="help-block"></div>
                                                    </div>

                                                </div>
                                                <div class="form-group col-lg-4 col-12">
                                                    <img src="{{ $adminData->profile_photo_path ? url('upload/profile/' . $adminData->profile_photo_path) : asset('upload/profile/no_image.jpg') }}"
                                                        alt="" id="showImage"
                                                        style="width: 100px; height:100px;">

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Change Password</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form novalidate="" method="POST" action="{{ url('admin/profile/up-pass') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
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
                                            
                                            

                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>

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
