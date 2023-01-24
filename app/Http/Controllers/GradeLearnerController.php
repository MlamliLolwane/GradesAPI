<?php

namespace App\Http\Controllers;

use App\Models\GradeLearner;
use App\Http\Requests\StoreGradeLearnerRequest;
use App\Http\Requests\UpdateGradeLearnerRequest;
use Illuminate\Http\Response;

class GradeLearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade_learners = GradeLearner::all();

        return response()->json(['data' => $grade_learners], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGradeLearnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeLearnerRequest $request)
    {
        $request->validated();

        $grade_learner = GradeLearner::create([
            'grade_id' => $request->grade_id,
            'learner_id' => $request->learner_id
        ]);

        return response()->json($grade_learner, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GradeLearner  $gradeLearner
     * @return \Illuminate\Http\Response
     */
    public function show($gradeLearnerID)
    {
        $grade_learner = GradeLearner::findOrFail($gradeLearnerID);

        return response()->json($grade_learner, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeLearnerRequest  $request
     * @param  \App\Models\GradeLearner  $gradeLearner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeLearnerRequest $request, $grade_learner_id)
    {
        $request->validated();

        $grade_learner = GradeLearner::where('id', $grade_learner_id)->update($request->all());

        return response()->json($grade_learner, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradeLearner  $gradeLearner
     * @return \Illuminate\Http\Response
     */
    public function destroy($gradeLearnerID)
    {
        $gradeLearner = GradeLearner::where('id', $gradeLearnerID)->delete();

        return response()->json($gradeLearner, Response::HTTP_OK);
    }
}
