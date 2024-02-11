<?php

namespace App\Livewire;

use App\Http\Controllers\SubmissionController;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On; 

class Form extends Component
{
    public int $step = 1;
    public bool $can_submit = true;

    public $dob = null;
    public $marriage_date = null;

    // Form Fields
    public string $first_name = '';
    public string $last_name = '';
    public string $address = '';
    public string $city = '';
    public string $country = '';
    public ?int $dob_day = null;
    public ?int $dob_month = null;
    public ?int $dob_year = null;
    public ?bool $is_married = null;
    public ?int $marriage_day = null;
    public ?int $marriage_month = null;
    public ?int $marriage_year = null;
    public string $country_of_marriage = '';
    public ?bool $is_widowed = null;
    public ?bool $ever_married = null;

    // Submission
    public $submission = null;


    // Validating the form fields
    public function validate_step()
    {
        $rules = [];
        $messages = [];
        if($this->step == 1)
        {
            $rules = [
                "first_name" => "string|required|max:255",
                "last_name" => "string|required|max:255",
                "address" => "string|required|max:255",
                "city" => "string|required|max:255",
                "country" => "string|required|max:255",
                "dob_day" => "required|integer|min:1|max:31",
                "dob_month" => "required|integer|min:1|max:12",
                "dob_year" => "required|integer|min:1900|max:".date('Y'),
            ];
            $messages = [
                "dob_day.required" => "The day field is required",
                "dob_month.required" => "The month field is required",
                "dob_year.required" => "The year field is required",
            ];
        }else{
            $rules = [
                "is_married" => "required|boolean",
            ];
            $messages = [
                "is_married.required" => "Please select an option",
                "is_widowed.required" => "Please select an option",
                "ever_married.required" => "Please select an option",
                "marriage_day.required" => "The day field is required",
                "marriage_month.required" => "The month field is required",
                "marriage_year.required" => "The year field is required",
                "country_of_marriage.required" => "The country of marriage field is required",
            ];

            if($this->is_married)
            {
                $rules = array_merge($rules, [
                    "country_of_marriage" => "required|string|max:255",
                    "marriage_day" => "required|integer|min:1|max:31",
                    "marriage_month" => "required|integer|min:1|max:12",
                    "marriage_year" => "required|integer|min:1900|max:".date('Y'),
                ]);
            }else{
                $rules = array_merge($rules, [
                    "is_widowed" => "required|boolean",
                    "ever_married" => "required|boolean",
                ]);
            
            }
        }
        $this->validate($rules, $messages);
    }

    // Triggered when click "Next" or "Submit"
    public function next()
    {
        $this->validate_step();

        if($this->step == 1){
            $this->marriage_date_changed();
            return $this->step++;
        }

        if($this->step == 2){
            $this->store();
        }
    }

    // Triggered when click "Previous"
    public function back()
    {
        $this->can_submit = true;
        $this->step--;
    }

    // Changing the value of is_married when value changes on the form
    public function set_is_married($value)
    {
        $this->resetErrorBag();
        $this->marriage_date_changed();
        $this->is_married = $value;
    }

    // Changing the value of is_widowed when value changes on the form
    public function set_is_widowed($value)
    {
        $this->is_widowed = $value;
    }

    // Changing the value of ever_married when value changes on the form
    public function set_ever_married($value)
    {
        $this->ever_married = $value;
    }

    // Combining the date fields to a single date for Date of Birth. Triggered when value of dob_day, dob_month, or dob_year changes
    public function dob_changed()
    {
        if(!empty($this->dob_day) && !empty($this->dob_month) && !empty($this->dob_year)){
            $this->dob = Carbon::createFromDate($this->dob_year, $this->dob_month, $this->dob_day);
        }
    }

    // Combining the date fields to a single date for Marriage Date. Triggered when value of marriage_day, marriage_month, or marriage_year changes
    public function marriage_date_changed()
    {
        if(!empty($this->marriage_day) && !empty($this->marriage_month) && !empty($this->marriage_year)){
            $this->marriage_date = Carbon::createFromDate($this->marriage_year, $this->marriage_month, $this->marriage_day);
            
            $years_difference = $this->marriage_date->diffInYears($this->dob);

            if($years_difference < 18 && $this->is_married){
                $this->can_submit = false;
                $this->addError('marriage_date', 'You are not eligible to apply because your marriage occurred before your 18th birthday.');
            }else{
                $this->can_submit = true;
                $this->resetErrorBag('marriage_date');
            }
        }
    }

    // Storing the form data
    public function store()
    {
        // Double check if the form is valid
        $this->validate_step();

        // Store the data to the database
        $submission_controller = new SubmissionController();
        $this->submission = $submission_controller->store($this);
        $this->step = 3;
    }

    // Reset the form, triggered when click "Start another submission"
    public function restart()
    {
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.pages.registration.form');
    }








    # Events
    #[On('dropdown-select-value-changed')]
    public function change_value($data){
        $this->{$data['name']} = $data['value'];

        if($data["name"] == "dob_day" || $data["name"] == "dob_month" || $data["name"] == "dob_year"){
            $this->dob_changed();
        }

        if($data["name"] == "marriage_day" || $data["name"] == "marriage_month" || $data["name"] == "marriage_year"){
            $this->marriage_date_changed();
        }
    }
}
