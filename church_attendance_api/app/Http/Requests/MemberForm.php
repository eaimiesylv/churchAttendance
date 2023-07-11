<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberForm extends FormRequest
{
   
    public function rules()
    {
        return [
            'birthday' => ['required', 'string', 'max:8'],
            'cell_id' => ['required', 'string', 'max:8'],
            'service_unit_id' => ['required', 'string', 'max:8'],
            'water_baptism' => ['required', 'string', 'max:8'],
            'believer_foundation' => ['required', 'string', 'max:8'], 
           //'passport' => ['required', 'in:jpg,JPG,png,PNG,jpeg,JPEG'],
           //'passport' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
           'passport'=>'required',
		 
        ];
    }
	public function extractKey(){
	  //return $this->rules();
	  return $keys = array_keys($this->rules());
   }
}
