<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RolePermission;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class ManagementController extends Controller
{



    use HelperTrait;





    public function storeRole(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $role = new Role();


        $role->name = $request->name;
        $role->save();






        // -------------------------------
        // -------------------------------





        // 2: permissions
        foreach ($request->permissions ?? [] as $permission) {



            // 2.1: create
            $rolePermission = new RolePermission();


            $rolePermission->roleId = $role->id;
            $rolePermission->permissionId = $permission;

            $rolePermission->save();


        } // end loop








        return response()->json(['message' => 'Department has been created'], 200);




    } // end function











    // --------------------------------------------------------------------------------------------









    public function updateRole(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $role = Role::find($request->id);


        $role->name = $request->name;
        $role->save();






        // -------------------------------
        // -------------------------------





        // 2: permissions - removePrevious
        RolePermission::where('roleId', $role->id)->delete();


        foreach ($request->permissions ?? [] as $permission) {



            // 2.1: create
            $rolePermission = new RolePermission();


            $rolePermission->roleId = $role->id;
            $rolePermission->permissionId = $permission;

            $rolePermission->save();


        } // end loop








        return response()->json(['message' => 'Department has been updated'], 200);




    } // end function








    // --------------------------------------------------------------------------------------------









    public function removeRole(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Role::find($id)->delete();


        return response()->json(['message' => 'Department has been removed'], 200);



    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












} // end controller
