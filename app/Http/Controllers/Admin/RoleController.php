<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepo;
    protected $permissionRepo;

    public function __construct(
        RoleRepositoryInterface $roleRepo,
        PermissionRepositoryInterface $permissionRepo
    ) {
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;
    }

    public function index()
    {
        $roles = $this->roleRepo->getAll();
        return view('admin.roles.index', ['roles' => $roles]);
    }
    public function create()
    {
        $permissions = $this->permissionRepo->getPermissionGroup();
        // dd($permissions);
        return view('admin.roles.create', ['permissions' => $permissions]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        $array = $request->all();
        // dd($request);
        $roleRepo = $this->roleRepo->insertRole($array);
        $role = new Role($roleRepo);
        return redirect()->route('roles.index')->with(['message' => 'Create Role suceess']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $roles = $this->roleRepo->find($id);
        $permissions = $this->permissionRepo->getPermissionGroup();
        return view('admin.roles.edit', ['role' => $roles, 'permissions' => $permissions]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        $roles = $this->roleRepo->updateRole($request, $id);

        return redirect()->route('roles.index')->with(['message' => 'Update Role Success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->roleRepo->delete($id);
        return response()->json([
            'message' => 'Role deteled successfully '
        ]);
    }
}
