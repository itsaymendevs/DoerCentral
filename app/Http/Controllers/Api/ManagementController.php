<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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












    public function storeUser(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $user = new User();


        $user->name = $request->name;
        $user->phone = $request->phone ?? null;
        $user->email = $request->email;
        $user->password = Hash::make($request->password ?? '123456');
        $user->roleId = $request->roleId;



        // 1.2: imageFile
        $user->imageFile = $request->imageFileName ?? null;



        $user->save();








        return response()->json(['message' => 'User has been created'], 200);




    } // end function











    // --------------------------------------------------------------------------------------------









    public function updateUser(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $user = User::find($request->id);


        $user->name = $request->name;
        $user->phone = $request->phone ?? null;
        $user->email = $request->email;
        $user->roleId = $request->roleId;



        // 1.2: imageFile
        $user->imageFile = $request->imageFileName ?? null;





        $user->save();








        return response()->json(['message' => 'User has been updated'], 200);



    } // end function








    // --------------------------------------------------------------------------------------------









    public function removeUser(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        User::find($id)->delete();


        return response()->json(['message' => 'User has been removed'], 200);



    } // end function




















    // --------------------------------------------------------------------------------------------









    public function toggleUser(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        $user = User::find($id);

        $user->isActive = ! boolval($user->isActive);
        $user->save();





        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------








} // end controller
