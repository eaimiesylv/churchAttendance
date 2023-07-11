<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\HelperClass\Imageupload;
use App\Events\NewUserEvent;
use App\Services\RegistrationField;
use Illuminate\Support\Str;
use App\Models\User;
use App\Repository\First_timer;
use App\Models\Member;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data,)
    {
       
       try{ 
            $path="no.jpg";
            if($data['membershipType']=='member'){
                $path=\App::make(Imageupload::class, [$data['passport'],'passport']);
                $path=$path['storage_path'];
            }
           
              return User::create([
                'name' => $data['name'],
                'sex' => $data['sex'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'marital_status' =>$data['marital_status'],
                'age_range' => $data['age_range'],
                'state_of_origin' => $data['state_of_origin'],
                'lga' => $data['lga'],
                'born_again' => $data['born_again'],
                'email' =>$data['email'],
                'password' => Hash::make($data['password']),
                'ip' => request()->getClientIp(),
                'hash' => Str::uuid(),
                'passport' => $path,
                'is_admin' =>0,
               
            ]);
           
            //event(new (NewUserEvent($user))); 
        }
        catch (QueryException $e) {
            dd('error', 'An error occurred while inserting data: ', $e);
        }
        
    }
    
    public function showRegistrationPage()
    {
        
        return view('auth.register');
    }
    public function showRegistrationForm(RegistrationField $registrationFormFields){
           //This pass all the registration fields  as api request
        return json_encode($registrationFormFields);
    }
}
