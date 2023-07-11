<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
           //member validation rule
           $member=[
            'birthday' => ['required', 'string', 'max:8'],
            'cell_id' => ['required', 'string', 'max:8'],
            'service_unit_id' => ['required', 'string', 'max:8'],
            'water_baptism' => ['required', 'string', 'max:8'],
            'believer_foundation' => ['required', 'string', 'max:8'], 
           //'passport' => ['required', 'in:jpg,JPG,png,PNG,jpeg,JPEG'],
           //'passport' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
           'passport'=>'required',
        ];
        //user validation rule
        $user=[
            
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
               
               
                '_token' => ['required', 'string', 'min:2'],
            
        ];
         //first timer validation rule
         $firstTimer=[
            'on_transit' => ['required', 'string', 'max:8'],
            'transit_duration' => ['required', 'string', 'max:8'],
            'should_we_visit' => ['required', 'string', 'max:8'],
            'become_a_member' => ['required', 'string', 'max:8'],
            'see_pastor' => ['required', 'string', 'max:8'],
            'prayer_request'=>'',
        ];
        $validationRules = ($data['membershipType'] == 'member') ? array_merge($user, $member) : array_merge($user, $firstTimer);
        $error=Validator::make($data, $validationRules);
        //membershipType key is use to know which page to returned to
        $errs = [];
            foreach ($error->errors()->messages() as $key => $value) {
                $errs[$key] = is_array($value) ? implode(',', $value) : $value;
                //implode is for when you have multiple errors for a same key
                //like email should valid as well as unique
            }
         if(count($errs)>0){
                $error->after(function ($validator) use ($data) {
                    $validator->errors()->add('source', $data['membershipType']);
                });
           
              return $error;
         }
        return $error;
    }
}
