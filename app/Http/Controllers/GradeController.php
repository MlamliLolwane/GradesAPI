<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use Illuminate\Http\Response;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::paginate(15);

        return response()->json($grades, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        $request->validated();

        $grade = Grade::create([
            'grade_number' => $request->grade_number,
            'grade_suffix' => $request->grade_suffix
        ]);

        return response()->json($grade, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show($grade_id)
    {
        $grade = Grade::findOrFail($grade_id);
        
        return response()->json($grade, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeRequest  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, $grade_id)
    {
        $request->validated();

        $grade = Grade::where('id', $grade_id);

        $grade->fill($request->all());

        return response()->json($grade, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($grade_id)
    {
        $grade = Grade::where('id', $grade_id)->delete();

        return response()->json($grade, Response::HTTP_OK);
    }
}
