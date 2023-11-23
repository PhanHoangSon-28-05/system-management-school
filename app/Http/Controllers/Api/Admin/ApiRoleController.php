<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class ApiRoleController extends RoutingController
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
    public function store(Request $request)
    {
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
    public function update(Request $request, string $id)
    {
        $roles = $this->roleRepo->find($id);

        return redirect()->route('roles.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
