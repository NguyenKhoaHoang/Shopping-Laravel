<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->permission = $permission;
        $this->role = $role;
    }
    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);

            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . '--- Line:' . $e->getLine());
            abort(505);
        }
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.edit', compact('permissionsParent', 'role', 'permissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $role = $this->role->find($id);
            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);


            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . '--- Line:' . $e->getLine());
            abort(505);
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->role);
    }
}
