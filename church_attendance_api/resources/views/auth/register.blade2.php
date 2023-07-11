@extends('layouts.login_register')

@section('content')
    <!-- created a component for login and registration form -->

    @component('components.reg_login_form_component', 
        [
            'title'=>'Create a new account',
            'FormFields' => isset($registrationFormFields)?$registrationFormFields:[],
            'route' =>  route('register'),
            'label'=> __('Register'),
            'spacing'=>["outer-col-md"=>'col-md-8',
                        "inner-col-md"=>'col-md-6',
                        "inner-offset"=>'offset-md-3',
                        "mt"=>'mt-4',
                        "mb"=>'mb-4'
            
            
                    ]

        ])
    
    @endcomponent
@endsection