@extends('layouts.admin')
@section('title') Permission Create @endsection
@section('permission-open') menu-open @endsection
@section('permission') active @endsection
@section('permission-create') active @endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Permission Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Permissions</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <form action="{{ route('permission.store') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">Select Role</label>
                                            <select class="form-control" name="role_id" id="role">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-layout-footer">
                                            <button type="submit" class="btn btn-info">Create</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Permission</th>
                                                <th>Add</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>List</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Roles</td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.create][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.destroy][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.index][list]" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Permissions</td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.create][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.destroy][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.index][list]" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sub admins</td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.create][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.destroy][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.index][list]" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Items</td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.store][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.delete][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.list][list]" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Departments</td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.store][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.delete][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.list][list]" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brands</td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.store][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.delete][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.list][list]" value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rates</td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][list]" value="1">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Products</td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.create][create]" value="1" class="control-input">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product][view]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.edit][edit]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.delete][delete]" value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.list][list]" value="1">
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


