<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\MemberForm;
use App\Http\Requests\FirstTimerForm;

class UserForm extends FormRequest
{
    public $type="";
    
    public function rules(Request $request)
    {
        $this->type=$request->membershipType;
        $memberRules = (new MemberForm())->rules();
        $firstTimerRules = (new FirstTimerForm())->rules();
        //for post action it calls the store method and join it with either the result of member of first timer rule

        return ($this->isMethod('POST') ? $this->store() : $this->update())
               + 
               (($this->type == 'member') ?$memberRules : $firstTimerRules);
            
       
    }
    protected function store(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'marital_status' => ['required', 'string', 'max:255'],
            'age_range' => ['required', 'string', 'max:255'],
            'state_of_origin' => ['required', 'string', 'max:255'],
            'lga' => ['required', 'string', 'max:255'],
            'born_again' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        
        
        ];
    }
    protected function update()
    {
        $userId = $this->route('student');
            return [
                
                'email' => [
                    'required',
                    'email',
                    'max:20',
                    Rule::unique('users', 'email')->ignore($userId),
                ],
            ];
        
    }


    //overide the validation method to add source property
    protected function failedValidation(Validator $validator)
    {
    
        $validator->errors()->add('source', $this->type);

        parent::failedValidation($validator);
    }

}
