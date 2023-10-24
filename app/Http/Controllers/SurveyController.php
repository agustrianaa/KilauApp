<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        return view('survey.SurveyTabel');
    }

    public function surveyForm()
    {
        return view('survey.SurveyForm');
    }

    public function store(Request $request)
    {
        
    }

    public function show(SurveyController $surveyController)
    {
        
    }


    public function edit(SurveyController $surveyController)
    {
        //
    }

    public function update(Request $request, SurveyController $surveyController)
    {
        
    }


    public function destroy(SurveyController $surveyController)
    {
        
    }
}
