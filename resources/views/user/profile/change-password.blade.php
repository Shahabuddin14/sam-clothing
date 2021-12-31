@extends('layouts.user')
@section('title') Profile @endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profile Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-3">
                        @include('user.profile.inc.sidebar')
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.update.password') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="userOldPassword">Old password</label>
                                        <input type="password" class="form-control" id="userOldPassword" placeholder="Enter old password"  name="old_password" />
                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userNewPassword">New password</label>
                                        <input type="password" class="form-control" id="userNewPassword" placeholder="Enter new password"  name="new_password" />
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userConfirmPassword">Confirm password</label>
                                        <input type="password" class="form-control" id="userConfirmPassword" placeholder="Confirm password"  name="password_confirmation" />
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


