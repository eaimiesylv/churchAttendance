<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstTimerForm extends FormRequest
{
    
    public function rules()
    {
        return [
            'on_transit' => ['required', 'string', 'max:8'],
            'transit_duration' => ['required', 'string', 'max:8'],
            'should_we_visit' => ['required', 'string', 'max:8'],
            'become_a_member' => ['required', 'string', 'max:8'],
            'see_pastor' => ['required', 'string', 'max:8'],
            'prayer_request'=>'',
			'cell_id'=>'',
			
        ];
    }
  public function extractKey(){
	  //return $this->rules();
	  return $keys = array_keys($this->rules());
  }
}
