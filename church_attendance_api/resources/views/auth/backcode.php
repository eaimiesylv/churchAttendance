<!-- created a component for login and registration form 
    @component('components.reg_login_form_component', 
        [
            'title'=>'Sign in to your account',
            'FormFields' => $loginFormFields,
            'route' =>  route('login'),
            'label'=> __('Login'),
            'spacing'=>["outer-col-md"=>'col-md-8',
                        "inner-col-md"=>'col-md-6',
                        "inner-offset"=>'offset-md-3',
                        "mt"=>'mt-4',
                        "mb"=>'mb-4'
            
            
                    ]

        ])
    
    @endcomponent-->


    <div x-data="data()" x-init="fetchData()">
     
     <div x-html="data"></div>
   
 </div>
 
<script src="{{asset('js/form.js')}}"></script>