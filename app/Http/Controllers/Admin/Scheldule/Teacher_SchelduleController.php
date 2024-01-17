<?php

namespace App\Http\Controllers\Admin\Scheldule;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Schedule;
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
    protected $schelRepo;


    public function __construct(
        PeriodRepositoryInterface $periodRepo,
        RankRepositoryInterface $rankRepo,
        SubjectRepositoryInterface $subjectRepo,
        GradeRepositoryInterface $gradeRepo,
        RoomRepositoryInterface $roomRepo,
        ScheduleRepositoryInterface $schelRepo,
    ) {
        $this->periodRepo = $periodRepo;
        $this->rankRepo = $rankRepo;
        $this->subjectRepo = $subjectRepo;
        $this->gradeRepo = $gradeRepo;
        $this->roomRepo = $roomRepo;
        $this->schelRepo = $schelRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function rank_update_periods(Request $request)
    {
        try {
            $array = $request->all();
            $periods = $this->schelRepo->getTeachersNotInProid($array);
            return response()->json($periods);
        } catch (\Exception $e) {
            // Handle any errors, log them, or return an error response as needed
            return response()->json(['error' => 'Failed to fetch periods.']);
        }
    }

    public function getGrades(Request $request, $periodId)
    {
        try {

            $array = $request->all();
            $getAllGrade = $this->schelRepo->getAllGradeInProidAndRank($array, $periodId);
            $grades = $this->schelRepo->getGradeNoInProidAndRank($getAllGrade);
            return response()->json(['grades' => $grades]);
        } catch (\Exception $e) {
            // Handle any errors, log them, or return an error response as needed
            return response()->json(['error' => 'Failed to fetch periods.']);
        }
    }

    public function getRooms(Request $request, $periodId)
    {
        $array = $request->all();
        $getAllRoom = $this->schelRepo->getAllRoomInProidAndRank($array, $periodId);
        $rooms = $this->schelRepo->getRoomNoInProidAndRank($getAllRoom);
        // dd($rooms);
        try {

            return response()->json(['rooms' => $rooms]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch periods.']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(string $slugTeacher)
    {
        $ranks = $this->rankRepo->getAll();
        $schedules = $this->rankRepo->checkRank($slugTeacher);
        $periods = $this->periodRepo->getAll();
        $subjects = $this->subjectRepo->getallSubjectToSlugTeacher($slugTeacher);
        $grades = $this->gradeRepo->getAll();
        $rooms = $this->roomRepo->getAll();
        return view(
            'admin.schedules.add',
            [
                'ranks' => $ranks, 'periods' => $periods, 'subjects' => $subjects, 'geades' => $grades,
                'rooms' => $rooms, 'slugTeacher' => $slugTeacher, 'schedules' => $schedules
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        $array = $request->all();
        $check = $this->schelRepo->checkTeacheSchedule($array);
        if ($check != "") {
            return redirect()->route('schedules.teachers-scheldule.add-scheldule-teacher', $slug)->with(['error' => $check]);
        } else {
            $teacher = $this->schelRepo->createTeacheSchedule($array, $slug);
            return redirect()->route('schedules.show', $slug)->with(['message' => 'Add scheldule success']);
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
    public function edit($slugTeacher, string $id)
    {
        $schedule = $this->schelRepo->find($id);
        $schedules = $this->rankRepo->checkRank($slugTeacher);
        $ranks = $this->schelRepo->selectIdRank($schedule->rank_id);
        $periods = $this->periodRepo->getAll();
        $subjects = $this->schelRepo->selectIdSubject($schedule->teacher_id, $schedule->detail_schedule->subject_id);
        $grades = $this->schelRepo->selectIdGrade($schedule->grade_id);
        $rooms = $this->schelRepo->selectIdRoom($schedule->detail_schedule->room_id);
        return view(
            'admin.schedules.edit',
            [
                'ranks' => $ranks, 'periods' => $periods, 'subjects' => $subjects, 'geades' => $grades,
                'rooms' => $rooms, 'slugTeacher' => $slugTeacher, 'schedules' => $schedules, 'scheduleFind' => $schedule,
                'slugTeacher' => $slugTeacher, 'id' => $id
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $slugTeacher)
    {
        $array = $request->all();
        $schedule = $this->schelRepo->updateTeacheSchedule($array, $id);
        return redirect()->route('schedules.show', $slugTeacher)->with(['message' => 'Update scheldule success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
