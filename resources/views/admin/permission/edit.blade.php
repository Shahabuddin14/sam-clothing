@extends('layouts.admin')

@section('title') Permission Update @endsection
@section('permission-open') menu-open @endsection
@section('permission') active @endsection
{{--@section('permission-create') active @endsection--}}


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
                            <li class="breadcrumb-item active">Update</li>
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
                            <form action="{{ route('permission.update',$permission->id) }}" method="POST" >
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">Select Role</label>
                                            <select class="form-control" name="role_id" id="role">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ ($permission->role_id == $role->id) ? 'selected':'' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-layout-footer">
                                            <button type="submit" class="btn btn-info">Update</button>
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
                                                    <input type="checkbox" name="permission[role.create][create]"
                                                           @isset($permission['permission']['role.create']['create']) checked @endisset value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role][view]"
                                                           @isset($permission['permission']['role']['view']) checked @endisset value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.edit][edit]"
                                                           @isset($permission['permission']['role.edit']['edit']) checked @endisset value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.destroy][delete]"
                                                           @isset($permission['permission']['role.destroy']['delete']) checked @endisset value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[role.index][list]"
                                                           @isset($permission['permission']['role.index']['list']) checked @endisset value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Permissions</td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.create][create]"
                                                           @isset($permission['permission']['permission.create']['create']) checked @endisset value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission][view]"
                                                           @isset($permission['permission']['permission']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.edit][edit]"
                                                           @isset($permission['permission']['permission.edit']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.destroy][delete]"
                                                           @isset($permission['permission']['permission.destroy']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[permission.index][list]"
                                                           @isset($permission['permission']['permission.index']['list']) checked @endisset
                                                           value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sub admins</td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.create][create]"
                                                           @isset($permission['permission']['subAdmin.create']['create']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin][view]"
                                                           @isset($permission['permission']['subAdmin']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.edit][edit]"
                                                           @isset($permission['permission']['subAdmin.edit']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.destroy][delete]"
                                                           @isset($permission['permission']['subAdmin.destroy']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[subAdmin.index][list]"
                                                           @isset($permission['permission']['subAdmin.index']['list']) checked @endisset
                                                           value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Items</td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.store][create]"
                                                           @isset($permission['permission']['category.store']['create']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category][view]"
                                                           @isset($permission['permission']['category']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.edit][edit]"
                                                           @isset($permission['permission']['category.edit']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.delete][delete]"
                                                           @isset($permission['permission']['category.delete']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[category.list][list]"
                                                           @isset($permission['permission']['category.list']['list']) checked @endisset
                                                           value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Departments</td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.store][create]"
                                                           @isset($permission['permission']['department.store']['create']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department][view]"
                                                           @isset($permission['permission']['department']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.edit][edit]"
                                                           @isset($permission['permission']['department.edit']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.delete][delete]"
                                                           @isset($permission['permission']['department.delete']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[department.list][list]"
                                                           @isset($permission['permission']['department.list']['list']) checked @endisset
                                                           value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brands</td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.store][create]"
                                                           @isset($permission['permission']['brand.store']['create']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand][view]"
                                                           @isset($permission['permission']['brand']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.edit][edit]"
                                                           @isset($permission['permission']['brand.edit']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.delete][delete]"
                                                           @isset($permission['permission']['brand.delete']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[brand.list][list]"
                                                           @isset($permission['permission']['brand.list']['list']) checked @endisset
                                                           value="1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rates</td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][create]"
                                                           @isset($permission['permission']['admin.rate']['create']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][view]"
                                                           @isset($permission['permission']['admin.rate']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][edit]"
                                                           @isset($permission['permission']['admin.rate']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][delete]"
                                                           @isset($permission['permission']['admin.rate']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[admin.rate][list]"
                                                           @isset($permission['permission']['admin.rate']['list']) checked @endisset
                                                           value="1">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Products</td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.create][create]"
                                                           @isset($permission['permission']['product.create']['create']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product][view]"
                                                           @isset($permission['permission']['product']['view']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.edit][edit]"
                                                           @isset($permission['permission']['product.edit']['edit']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.delete][delete]"
                                                           @isset($permission['permission']['product.delete']['delete']) checked @endisset
                                                           value="1">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission[product.list][list]"
                                                           @isset($permission['permission']['product.list']['list']) checked @endisset
                                                           value="1">
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


