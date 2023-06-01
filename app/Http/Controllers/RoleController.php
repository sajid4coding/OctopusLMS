<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use function PHPUnit\Framework\returnSelf;

class RoleController extends Controller
{
    // ================== Form Table Show  ======================

    function create(){
        $roles = Role::all();
        return view('admin.role_management.add_role',compact('roles'));
    }

    // ================== Form Submit  ======================
    function store(Request $request){
        $role = Role::create(['name' => $request->name]);
        return back()->with('success','Created Successfully');
    }
    // ================== Permission Data Delete  ======================

    function delete($id){
        Role::find($id)->delete();
        return back()->with('delete_success','Successfully Delete');
    }

    // ================== Permission Form  ======================
    function create_permission($id){


        $permissions = Permission::all();


        return view('admin.role_management.add_permission',compact('id'));
    }
    // ================== Permission Form Submit  ======================

    function store_permission(Request $request){
        // return $request;
        $permission = Permission::create(['name' => $request->name]);



        $role = Role::find($request->role_id);
        $role->givePermissionTo($permission->id);
        $permission->assignRole($role);
        return back()->with('success','Created Successfully');
    }
    // ================== Permission Data Delete  ======================

    function delete_permission($id){

        Permission::find($id)->delete();
        // $role = Permission::create(['name' => $request->name]);
        return back()->with('delete_success','Successfully Delete');
    }

      // ================== Assign Role Form  ======================
    function assign_role_permission(){
        $permissions = Permission::all();
        $roles = Role::all();
        return view('admin.role_management.assign_role',compact('roles','permissions'));
    }
    function assign_role_permission_store(Request $request){


        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);

         $role->givePermissionTo($permission);
         $permission->assignRole($role);
        return back()->with('success','Created Successfully');
    }

}
