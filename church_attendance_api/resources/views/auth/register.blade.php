@extends('layouts.login_register')
<style>
    [x-cloak] {
        display: none;
    }
</style>
@section('content')
<div class="container">
{{$errors}}
    <div class="row justify-content-center">
        <div id="wrapper" class="col-md-10">
            <h4>Register New Member</h4>
            
            <!-- all users details -->
            <form method="POST" action="/register" enctype="multipart/form-data">
                <!--$errors->toArray() converts the returned error to array
            
            
            -->
                
                <div x-data="data('register')" x-init="{{ $errors->any() ? 'fetchData('.json_encode($errors->toArray()).')' : 'fetchData()' }}">
                    @csrf
                    <div x-html="renderPage"></div>
                </div>
                <!-- member details -->
               
                <hr>

                <div x-data="{ membershipType: '{{ $errors->any() ? $errors->toArray()['source'][0]:'member'}}', consentChecked: false }">
                
                    <div class='mt-3 col-md-8 offset-md-2'>
                        <input type="radio" id="member" value="member" x-model="membershipType" @click="membershipType = 'member'">
                        <label for="member">Member</label>

                        <input type="radio" id="firstTimer" value="firstTimer" x-model="membershipType" @click="membershipType = 'firstTimer'">
                        <label for="firstTimer">First Timer</label>
                    </div>
                    <hr>
                    <template x-if="membershipType === 'member'">
                        <div x-show="true" x-transition x-cloak>
                            <h4>Membership Detail</h4>
                            <div x-data="data('member')" x-init="{{ $errors->any() ? 'fetchData('.json_encode($errors->toArray()).')' : 'fetchData()' }}">
                                <div x-html="renderPage" id="member"></div>
                            </div>
                            <hr>
                        </div>
                    </template>

                    <template x-if="membershipType === 'firstTimer'">
                        <div x-show="true" x-transition x-cloak>
                            <h4>First Timer Detail</h4>
                            <div x-data="data('firsttimer')"  x-init="{{ $errors->any() ? 'fetchData('.json_encode($errors->toArray()).')' : 'fetchData()' }}">
                                <div x-html="renderPage" id="firstTimer"></div>
                            </div>
                            <hr>
                        </div>
                    </template>

                    <div class='mt-3 col-md-8 offset-md-2'>
                        <input type="checkbox" x-model="consentChecked" />
                        <a href="" style="color:blue;font-weight:normal"> I agree to the consent form</a>
                    </div>
                    <div class='mt-3 col-md-8 offset-md-2'>
                        <button :disabled="!consentChecked"  class="btn btn-primary" title="Click on the checkbox before submitting">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
