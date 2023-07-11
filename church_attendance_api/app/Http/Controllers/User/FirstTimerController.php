<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\First_timer;
use Illuminate\Http\Request;
use App\Services\FirstTimerField;
class FirstTimerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\First_timer  $first_timer
     * @return \Illuminate\Http\Response
     */
    public function show(First_timer $first_timer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\First_timer  $first_timer
     * @return \Illuminate\Http\Response
     */
    public function edit(First_timer $first_timer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\First_timer  $first_timer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, First_timer $first_timer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\First_timer  $first_timer
     * @return \Illuminate\Http\Response
     */
    public function destroy(First_timer $first_timer)
    {
        //
    }
	 public function showMemberForm(FirstTimerField $FirstTimerField){
           //This pass all the registration fields  as api request
		   //return json_encode('ok');
		   return json_encode($FirstTimerField);
			//return 'this it';
    }
}
