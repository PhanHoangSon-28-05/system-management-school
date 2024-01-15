<?php

namespace App\Http\Controllers\Admin\Scheldule;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\Teacher;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Period\PeriodRepositoryInterface;
use App\Repositories\Rank\RankRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class Teacher_SchelduleController extends Controller
{
    protected $periodRepo;
    protected $rankRepo;
    protected $subjectRepo, $gradeRepo, $roomRepo;
    protected $teacherSchelRepo;


    public function __construct(
        PeriodRepositoryInterface $periodRepo,
        RankRepositoryInterface $rankRepo,
        SubjectRepositoryInterface $subjectRepo,
        GradeRepositoryInterface $gradeRepo,
        RoomRepositoryInterface $roomRepo,
        ScheduleRepositoryInterface $teacherSchelRepo,
    ) {
        $this->periodRepo = $periodRepo;
        $this->rankRepo = $rankRepo;
        $this->subjectRepo = $subjectRepo;
        $this->gradeRepo = $gradeRepo;
        $this->roomRepo = $roomRepo;
        $this->teacherSchelRepo = $teacherSchelRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function rank_update_periods(Request $request)
    {
        try {
            $array = $request->all();
            $periods = $this->teacherSchelRepo->getTeachersNotInProid($array);
            return response()->json($periods);
        } catch (\Exception $e) {
            // Handle any errors, log them, or return an error response as needed
            return response()->json(['error' => 'Failed to fetch periods.']);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function add(string $slug)
    {
        $ranks = $this->rankRepo->getAll();
        $periods = $this->periodRepo->getAll();
        $subjects = $this->subjectRepo->getAll();
        $grades = $this->gradeRepo->getAll();
        $rooms = $this->roomRepo->getAll();
        return view(
            'admin.schedules.add',
            [
                'ranks' => $ranks, 'periods' => $periods, 'subjects' => $subjects, 'geades' => $grades,
                'rooms' => $rooms, 'slugTeacher' => $slug
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        $array = $request->all();
        $check = $this->teacherSchelRepo->checkTeacheSchedule($array);
        if ($check != "") {
            return redirect()->route('schedules.show', $slug)->with(['erro' => $check]);
        } else {
            $teacher = $this->teacherSchelRepo->createTeacheSchedule($array, $slug);
            return redirect()->route('schedules.show', $slug)->with(['message' => 'Create success']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
