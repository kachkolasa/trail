<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class SubmissionController extends Controller
{
    public function store($data)
    {
        $submission = new Submission();
        $submission->first_name = $data->first_name;
        $submission->last_name = $data->last_name;
        $submission->address = $data->address;
        $submission->city = $data->city;
        $submission->country = $data->country;
        $submission->date_of_birth = $data->dob;
        $submission->is_married = $data->is_married;

        if($data->is_married){
            $submission->date_of_marriage = $data->marriage_date;
            $submission->country_of_marriage = $data->country_of_marriage;
        }else{
            $submission->is_widowed = $data->is_widowed;
            $submission->ever_married = $data->ever_married;
        }

        $submission->save();

        return $submission;
    }
}
