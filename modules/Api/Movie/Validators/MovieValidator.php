<?php

namespace Movie\Api\Movie\Validators;

use Illuminate\Support\Facades\Validator;

class MovieValidator
{
    public function isValid($inputs)
    {
        $rules = [
            'title'    => 'required|max:30|min:0',
            'summary' => 'max:225|min:0',
        ];
    
        $messages = [
            'title.required' => "The title field is required.",                           
            'title.max' => "The title field should not exceed greater than 30 characters.", 
            'title.min' => "The title field should not exceed less than 0 characters.",                     
            'summary.min' => "The summary field should not exceed less than 0 characters.",                     
            'summary.max' => "The summary field should not exceed greater than 30 characters.",                   
        ];
    
        $data = [];
        $data = $inputs;
        
        return Validator::make($data, $rules, $messages);
    }
}