@extends('layouts.login_register')
@section('content')
<!--@if($errors->any())
  {{print_r($errors->all())}}
@endif
@php
    $errorsArray = $errors->toArray();
    print_r($errorsArray);
@endphp-->

<div class="container">
    <div class="row justify-content-center">
        <div id="wrapper" class="col-md-10">
       
            <h4>Sign in to your account</h4>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

               <!--data method is found in common.js -->
            <div x-data="data('login')" x-init="{{ $errors->any() ? 'fetchData('.json_encode($errors->toArray()).')' : 'fetchData()' }}">

            
            
                <!--form submission is handled by web route -->
                <form method="POST" action="/login" enctype="multipart/form-data">
                    @csrf
                    <div x-html="renderPage"></div>
                    <div class='mt-3 col-md-8 offset-md-2'>
                    
                       <input type="submit"  class="btn btn-primary" name ="submit" value="Login">
                      
                    
                    </div>
                 </form>
                </div>
            
        </div>
    </div>
</div>
   <!--<script src="{{asset('js/pages/loginform.js')}}"></script>-->
   

@endsection
