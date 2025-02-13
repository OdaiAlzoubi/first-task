<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\Subject\StoreSubjectRequest;

class SubjectController extends Controller
{
    public function index() {}
    public function store(StoreSubjectRequest $request)
    {
        Subject::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Subject has been created successfully.',
        ], 200);
    }

    public function getSubjectsFromUser($id)
    {
        $subjectsEnrolled = Subject::join('marks', 'subjects.id', '=', 'marks.subject_id')
            ->where('marks.student_id', $id)
            ->select('subjects.*')
            ->pluck('name','id');
        return response()->json([
            'data' => $subjectsEnrolled,
        ], 200);
    }

    public function getNotSubjectsFromUser($id)
    {
        $subjectsNotEnrolled = Subject::leftJoin('marks', function ($join) use ($id) {
            $join->on('subjects.id', '=', 'marks.subject_id')
                ->where('marks.student_id', '=', $id);
        })
            ->whereNull('marks.subject_id')
            ->select('subjects.*')
            ->pluck('name','id');
        return response()->json([
            'data' => $subjectsNotEnrolled,
        ], 200);
    }
}
