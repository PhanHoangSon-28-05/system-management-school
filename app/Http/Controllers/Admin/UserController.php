<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\User\UserRepositoryInterface;

use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    protected $userRepo, $roleRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        RoleRepositoryInterface $roleRepo,
    ) {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAll();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = $this->roleRepo->getRoles();
        return view('admin.users.create', ['roles' => $roles]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
