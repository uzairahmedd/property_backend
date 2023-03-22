<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->user()->can('role.list')) {
            $roles = Role::get();
            return view('admin.role.index', compact('roles'));
        }else{
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth()->user()->can('role.create')) {
            $permisions = Permission::all();
            $permission_groups = User::getPermissionGroup();
            return view('admin.role.create', compact('permisions', 'permission_groups'));
        }
        else{
            abort(401);
        }
    }

    public function permission_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:permissions|max:100',
            'group_name' => 'required|max:100',
        ]);
        $role = Permission::create(['name' => $request->name, 'group_name' => $request->group_name]);
        return response()->json(['Permision created successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:100',
        ]);
        $role = Role::create(['name' => $request->name]);
        //Store $request logs
        $log_id = AdminLogs::create(['log_code' => 'R3', 'role_id'=> $role->id, 'request' => serialize($request->all())]);
        $permissions = $request->input('permissions');

        // if (!empty($permissions)) {

            $role->syncPermissions($permissions);
        // }

        //store response
        \Illuminate\Support\Facades\DB::table('admin_logs')->where('id', $log_id->id)->update(['user_id' => Auth::id(), 'response' => serialize('Role created successfully!'), 'message' => 'Role created!']);

        return response()->json(['Role created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth()->user()->can('role.edit')) {
            $role = Role::findById($id);
            $all_permissions = Permission::all();
            $permission_groups = User::getpermissionGroups();
            return view('admin.role.edit', compact('role', 'all_permissions', 'permission_groups'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Store $request logs
        $log_id = AdminLogs::create(['log_code' => 'R3', 'role_id'=> $id, 'request' => serialize($request->all())]);
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        $role = Role::findById($id);
        Role::where('id',$id)->update(['name' => $request->name]);
        $permissions = $request->input('permissions');

        // if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        // }
        //store response
        \Illuminate\Support\Facades\DB::table('admin_logs')->where('id', $log_id->id)->update(['user_id' => Auth::id(), 'response' => serialize('Role updated successfully!'), 'message' => 'Role updated!']);
        return response()->json(['Role has been updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Auth()->user()->can('role.delete')) {
            if ($request->status == 'delete') {
                if ($request->ids) {
                    foreach ($request->ids as $id) {
                        Role::destroy($id);
                    }
                }
            }
            return response()->json('Role deleted successfully!');
        }
        else{
            abort(401);
        }
    }

    //Input Logs
    public function get_role_logs($id)
    {
        $logs = AdminLogs::where('role_id', $id)->get();
        return success_response($logs, 'Admin logs get successfully!');
    }


}
