<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$userFormFields = [
            'fullname' => [
                'id' => 'fullname',
                'name' => 'name',
                'type' => 'text',
                'label' => __('Full name'),
                'attributes' => [
                    'required' =>'required',
                    'class' => 'form-control',
                    'autofocus' => 'autofocus',
                ],
               
                'value' => old('fullname'),
            ],
            'phone' => [
                'id' => 'phone',
                'name' => 'phone',
                'type' => 'number',
                'label' => __('Phone Number'),
                'attributes' => [
                    'required' =>'required',
                    'class' => 'form-control',
                    'autofocus' => 'autofocus',
                ],
               
                'value' => old('phone'),
            ],
            'address' => [
                'id' => 'address',
                'name' => 'address',
                'type' => 'text',
                'label' => __('Address'),
                'attributes' => [
                    'required' =>'required',
                    'class' => 'form-control',
                    'autofocus' => 'autofocus',
                ],
               
                'value' => old('address'),
            ],
            'department' => [
                'id' => 'department',
                'name' => 'department',
                'type' => 'text',
                'label' => __('Department'),
                'attributes' => [
                    'required' => 'required',
                    'class' => 'form-control',
                    'autofocus' => '',
                    
                ],
                
                'value' => old('department'),
            ],
            'attachement' => [
                'id' => 'attachement',
                'name' => 'attachement',
                'type' => 'file',
                'label' => __('Attachement'),
                'attributes' => [
                    'required' => 'required',
                    'class' => 'form-control',
                    'autofocus' => '',
                   
                ],
                
                'value' => old('attachment'),
            ],
            
        ];*/
        return view('user.dashboard.user_dashboard');
    }
}
