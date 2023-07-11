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
use App\Models\Member;
use App\Models\First_timer;
use App\Repository\First_timer as First_timers;

use App\Http\Requests\UserForm;
use App\Http\Requests\FirstTimerForm;
use App\Http\Requests\MemberForm;
use Session;
use DB;
class RegisterController extends Controller
{
    private function extractUserData($keys,$submittedForm){

        foreach($keys as $key=>$value){
          
            $member_or_firsttimer_detail[$value]=$submittedForm[$value];
            unset($submittedForm[$value]);
        }
        unset($submittedForm['password_confirmation']);
        unset($submittedForm['membershipType']);
        return ['member_or_firsttimer_detail'=>$member_or_firsttimer_detail,'user'=>$submittedForm];
    }

    public function store(UserForm $requests)
{
    DB::beginTransaction(); // Start the transaction
    
    try {
        $keys = ($requests->membershipType == 'member') ? (new MemberForm())->extractKey() : (new FirstTimerForm())->extractKey();
        $data = $this->extractUserData($keys, $requests->all());
        $userData = User::create($data['user']);

        if ($requests->membershipType == 'member') {
            $path = "no.jpg";
            if ($requests->hasFile('passport')) {
                $path = \App::make(Imageupload::class, [$requests->passport, 'passport']);
                $path = $path['storage_path'];
            }

            $merge_detail = array_merge($data['member_or_firsttimer_detail'], ['passport' => $path]);
            $member = $userData->member()->create($merge_detail);
            Session::flash('message', 'Submission Successful!');
        } else {
            $member = $userData->first_timer()->create($data['member_or_firsttimer_detail']);
            Session::flash('message', 'Submission Successful!');
        }

        DB::commit(); // Commit the transaction

        return redirect('/login');
    } catch (\Exception $e) {
        DB::rollback(); // Rollback the transaction in case of an exception
        throw $e; // Re-throw the exception to handle it elsewhere
    }
}


    
    public function showRegistrationPage()
    {
        
        return view('auth.register');
    }
    public function showRegistrationForm(RegistrationField $registrationFormFields){
           //This pass all the registration fields  as api request
           //dd($registrationFormFields);
        return json_encode($registrationFormFields);
    }
}
