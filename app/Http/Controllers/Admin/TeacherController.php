<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Repositories\Subject\SubjectRepositoryInterface;

class TeacherController extends Controller
{

    protected $teacherRepo;
    protected $subjectRepo;

    public function __construct(
        TeacherRepositoryInterface $teacherRepo,
        SubjectRepositoryInterface $subjectRepo,
    ) {
        $this->teacherRepo = $teacherRepo;
        $this->subjectRepo = $subjectRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($this->teacherRepo);
        $teacher = $this->teacherRepo->getAll();
        //dd($teacher);
        return view('admin.teachers.index', ['teachers' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTeacherRequest $request)
    {
        $array = $request->all();
        $teacher = $this->teacherRepo->insertTeacher($array);
        return redirect()->route('teachers.index')->with(['message' => 'Create Teacher suceess']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $teacher = $this->teacherRepo->findById($id);
        $idallSubject =  $this->subjectRepo->getallSubject($id);
        $subjects =  $this->subjectRepo->getSubjectNotInGiveTeachet($idallSubject);
        // dd($subjects);
        if (!$teacher) {
            return redirect()->route('admin.teachers.index')->with('error', 'Teacher not found.');
        }
        $check = $this->teacherRepo->checkAccountTeacher($id);
        return view('admin.teachers.show', ['teacher' => $teacher, 'check' => $check, 'subjects' => $subjects]);
    }

    public function add_subjectGiveteacher(Request $request, $id)
    {
        try {
            $array = $request->all();
            $teacher = $this->teacherRepo->subjectGiveteacher($array, $id);

            return redirect()->route('teachers.show', $id)->with(['message' => 'Add Subject Give Teacher suceess']);
        } catch (\Exception $e) {
            return redirect()->route('teachers.show', $id)->with(['error' => 'Failed to update subjects.']);
        }
    }

    public function destroy_subjectGiveteacher(string $idTeacher, string $id)
    {
        $subject = $this->teacherRepo->delete_subjectGiveteacher($id);
        // dd($id);
        return redirect()->route('teachers.show', $idTeacher)->with([
            'message' => 'Subject Give Teacher deteled successfully '
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $teachers = $this->teacherRepo->find($id);
        return view('admin.teachers.edit', ['teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, string $id)
    {
        //
        $array = $request->all();
        $teacher = $this->teacherRepo->updateTeacher($array, $id);

        return redirect()->route('teachers.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = $this->teacherRepo->deleteTeacher($id);

        return response()->json([
            'message' => 'Teacher deteled successfully '
        ]);
    }
}
