<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mark\StoreMarkRequest;
use App\Http\Requests\Mark\StoreStudentToSubjectRequest;
use App\Models\Mark;

class MarkController extends Controller
{
    public function store(StoreMarkRequest $request)
    {
        // Mark::create($request->validated());
        $mark = Mark::where('student_id', $request->student_id)
            ->where('subject_id', $request->subject_id)
            ->first();
            $mark->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Add Mark successfully!',
        ], 200);
        // $this->addStudentToSubject($request);
    }

    public function addStudentToSubject(StoreStudentToSubjectRequest $request)
    {
        if ($request->mark) {
            $mark = Mark::where('student_id', $request->student_id)
            ->where('subject_id', $request->subject_id)
            ->first();
        if ($mark) {
            $mark->update($request->validated());
        } else {
            return response()->json(['message' => 'Mark not found'], 404);
        }            return response()->json([
                'success' => true,
                'message' => 'Add Mark successfully!',
            ], 200);
        }
        Mark::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Add Student to Subject successfully!',
        ], 200);
    }
}
