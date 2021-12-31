<?php

namespace App\Traits;

Trait AdminPermission{
    public function checkRequestPermission(){
        if (
            empty(auth()->user()->role->permission['permission']['role.index']['list'])  && \Route::is('role.index') ||
            empty(auth()->user()->role->permission['permission']['role.create']['create'])  && \Route::is('role.create') ||
            empty(auth()->user()->role->permission['permission']['role.edit']['edit'])  && \Route::is('role.edit') ||
            empty(auth()->user()->role->permission['permission']['role']['view'])  && \Route::is('role') ||
            empty(auth()->user()->role->permission['permission']['role.destroy']['delete'])  && \Route::is('role.destroy') ||

            empty(auth()->user()->role->permission['permission']['permission.index']['list'])  && \Route::is('permission.index') ||
            empty(auth()->user()->role->permission['permission']['permission.create']['create'])  && \Route::is('permission.create') ||
            empty(auth()->user()->role->permission['permission']['permission.edit']['edit'])  && \Route::is('permission.edit') ||
            empty(auth()->user()->role->permission['permission']['permission']['view'])  && \Route::is('permission') ||
            empty(auth()->user()->role->permission['permission']['permission.destroy']['delete'])  && \Route::is('permission.destroy') ||

            empty(auth()->user()->role->permission['permission']['subAdmin.index']['list'])  && \Route::is('subAdmin.index') ||
            empty(auth()->user()->role->permission['permission']['subAdmin.create']['create'])  && \Route::is('subAdmin.create') ||
            empty(auth()->user()->role->permission['permission']['subAdmin.edit']['edit'])  && \Route::is('subAdmin.edit') ||
            empty(auth()->user()->role->permission['permission']['subAdmin']['view'])  && \Route::is('subAdmin') ||
            empty(auth()->user()->role->permission['permission']['subAdmin.destroy']['delete'])  && \Route::is('subAdmin.destroy') ||

            empty(auth()->user()->role->permission['permission']['category.list']['list'])  && \Route::is('category.list') ||
            empty(auth()->user()->role->permission['permission']['category.store']['create'])  && \Route::is('category.store') ||
            empty(auth()->user()->role->permission['permission']['category.edit']['edit'])  && \Route::is('category.edit') ||
            empty(auth()->user()->role->permission['permission']['category']['view'])  && \Route::is('category') ||
            empty(auth()->user()->role->permission['permission']['category.delete']['delete'])  && \Route::is('category.delete') ||

            empty(auth()->user()->role->permission['permission']['department.list']['list'])  && \Route::is('department.list') ||
            empty(auth()->user()->role->permission['permission']['department.store']['create'])  && \Route::is('department.store') ||
            empty(auth()->user()->role->permission['permission']['department.edit']['edit'])  && \Route::is('department.edit') ||
            empty(auth()->user()->role->permission['permission']['department']['view'])  && \Route::is('department') ||
            empty(auth()->user()->role->permission['permission']['department.delete']['delete'])  && \Route::is('department.delete') ||

            empty(auth()->user()->role->permission['permission']['brand.list']['list'])  && \Route::is('brand.list') ||
            empty(auth()->user()->role->permission['permission']['brand.store']['create'])  && \Route::is('brand.store') ||
            empty(auth()->user()->role->permission['permission']['brand.edit']['edit'])  && \Route::is('brand.edit') ||
            empty(auth()->user()->role->permission['permission']['brand']['view'])  && \Route::is('brand') ||
            empty(auth()->user()->role->permission['permission']['brand.delete']['delete'])  && \Route::is('brand.delete') ||

            empty(auth()->user()->role->permission['permission']['admin.rate']['list'])  && \Route::is('admin.rate') ||
            empty(auth()->user()->role->permission['permission']['admin.rate']['create'])  && \Route::is('admin.rate') ||
            empty(auth()->user()->role->permission['permission']['admin.rate']['edit'])  && \Route::is('admin.rate') ||
            empty(auth()->user()->role->permission['permission']['admin.rate']['view'])  && \Route::is('admin.rate') ||
            empty(auth()->user()->role->permission['permission']['admin.rate']['delete'])  && \Route::is('admin.rate') ||

            empty(auth()->user()->role->permission['permission']['product.list']['list'])  && \Route::is('product.list') ||
            empty(auth()->user()->role->permission['permission']['product.create']['create'])  && \Route::is('product.create') ||
            empty(auth()->user()->role->permission['permission']['product.edit']['edit'])  && \Route::is('product.edit') ||
            empty(auth()->user()->role->permission['permission']['product']['view'])  && \Route::is('product') ||
            empty(auth()->user()->role->permission['permission']['product.delete']['delete'])  && \Route::is('product.delete')

        ) {
            return view('admin.home');
        }
    }
}
