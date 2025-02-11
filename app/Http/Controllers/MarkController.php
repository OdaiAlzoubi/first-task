<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mark\StoreMarkRequest;
use App\Http\Requests\Mark\StoreStudentToSubjectRequest;
use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function store(StoreMarkRequest $request)
    {
        Mark::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Add Mark successfully!',
        ], 200);
    }

    public function addStudentToSubject(StoreStudentToSubjectRequest $request)
    {
        Mark::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Add Mark successfully!',
        ], 200);
    }
}
