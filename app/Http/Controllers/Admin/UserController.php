<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\User\UserRepositoryInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Student;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    protected $userRepo, $roleRepo, $teacherRepo, $studentRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        RoleRepositoryInterface $roleRepo,
        TeacherRepositoryInterface $teacherRepo,
        StudentRepositoryInterface $studentRepo,
    ) {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
        $this->teacherRepo = $teacherRepo;
        $this->studentRepo = $studentRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAll();
        return view('admin.users.index', ['users' => $users]);
    }

    public function addCountTeacher(string $slugTeacher)
    {
        $roles = $this->roleRepo->getAll()->groupBy('group');
        $teacher = $this->teacherRepo->getTeacherToSlug($slugTeacher);
        return view('admin.users.createTeacher', ['slugTeacher' => $slugTeacher, 'roles' => $roles, 'teacher' => $teacher]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeCountTeacher(RegisterRequest $request, $slugTeacher)
    {
        // dd($request);
        try {
            $array = $request->validated();
            $teacher = $this->teacherRepo->getTeacherToSlug($slugTeacher);
            // dd($teacher);
            $user = $this->userRepo->insertUserTeacher($array, $teacher->id);
            return redirect()->route('teachers.show', $teacher->id)->with(['message' => 'Create Account Teacher success']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function addCountStudent(string $slugStudent)
    {
        $roles = $this->roleRepo->getAll()->groupBy('group');
        $student = $this->studentRepo->getStudentToSlug($slugStudent);
        return view('admin.users.createStudent', ['slugStudent' => $slugStudent, 'roles' => $roles, 'student' => $student]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeCountStudent(Request $request, $slugStudent)
    {
        try {
            $array = $request->validated();
            $student = $this->studentRepo->getStudentToSlug($slugStudent);
            $user = $this->userRepo->insertUserStudent($array, $student->id);
            return redirect()->route('students.show', $student->id)->with(['message' => 'Create Account Student success']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    public function edit($id)
    {
        $user = $this->userRepo->editUser($id);
        $roles = $this->roleRepo->getAll()->groupBy('group');
        return view('admin.users.edit', compact('user', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $array = $request->all();
        $user = $this->userRepo->updateUser($array, $id);
        return redirect()->route('users.index')->with('message', 'create success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userRepo->delete($id);
        return response()->json([
            'message' => 'User deleted successfully.'
        ]);
    }
}
