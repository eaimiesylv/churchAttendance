<?php
namespace App\Services;
class FormField{
	private $answer=[['radio'=>'Yes', 'value'=>'1'],['radio'=>'No','value'=>'0']];
	private $state=[['select'=>'Lagos','value'=>'1'],['select'=>'Abuja','value'=>'1']];
	private $sex=[['radio'=>'Male','value'=>'m'],['radio'=>'Female','value'=>'f']];
	private $marital_status=[['radio'=>'Married','value'=>'married'],['radio'=>'Single','value'=>'single']];
	private $age_range=[['radio'=>'0-20','value'=>'0-20'],['radio'=>'21-40','value'=>'21-40'],['radio'=>'41-60','value'=>'41-60']];
	private $cell=[['select'=>'zion','value'=>'1'],['select'=>'dominion','value'=>'1']];
	private $service_unit=[['select'=>'zion','value'=>'1'],['select'=>'dominion','value'=>'1']];
	
	public function listField(){
		return[
				'fullname'=>['label'=>'fullname',			'value'=>'name',				'input'=>'input',		'data'=>''],
				
				'sex'=>['label'=>'sex',					'value'=>'sex',					'input'=>'radio',	'data'=>$this->sex],
				
				'address'=>['label'=>'address',			'value'=>'address',				'input'=>'input',	'data'=>''],
				
				'phone'=>['label'=>'phone',				'value'=>'phone',				'input'=>'number',	'data'=>''],
				
				'marital_status'=>['label'=>'marital status',	'value'=>'marital_status',		'input'=>'radio',	'data'=>$this->marital_status],
				
				'age_range'=>['label'=>'age range',			'value'=>'age_range',			'input'=>'radio',	'data'=>$this->age_range],
				
				'state_of_origin'=>['label'=>'state of origin',	'value'=>'state_of_origin',		'input'=>'select',	'data'=>$this->state],
				
				'lga'=>['label'=>'l.g.a',				'value'=>'lga',					'input'=>'select',	'data'=>$this->state],
				
				'born_again'=>['label'=>'are you born again',	'value'=>'born_again',			'input'=>'radio',	'data'=>$this->answer],
				
				'email'=>['label'=>'email',				'value'=>'email',				'input'=>'input',	'data'=>''],
				
				'password'=>['label'=>'password',			'value'=>'password',			'input'=>'password',	'data'=>''],
				
				'password_confirmation'=>['label'=>'password confirmation','value'=>'password_confirmation','input'=>'password',	'data'=>''],
				
				'passport'=>['label'=>'Passport',		'value'=>'passport',			'input'=>'file','data'=>''],
				
				'birthday'=>['label'=>'birthday',		'value'=>'birthday',			'input'=>'input','data'=>''],
				
				'cell'=>['label'=>'cell',			'value'=>'cell_id',				'input'=>'select','data'=>$this->cell],
				
				'service_unit'=>['label'=>'service unit',	'value'=>'service_unit_id',		'input'=>'select','data'=>$this->service_unit],
				
				'water_baptism'=>['label'=>'have you done water baptism','value'=>'water_baptism','input'=>'radio','data'=>$this->answer],
				
				'believer_foundation'=>['label'=>'have you completed beliver foundation','value'=>'believer_foundation','input'=>'radio','data'=>$this->answer],
				
				'on_transit'=>['label'=>'are you on transit',		'value'=>'on_transit',		 'input'=>'radio',		'data'=>$this->answer],
				
				'transit_duration'=>['label'=>'if yes, how long are you staying',	'value'=>'transit_duration', 'input'=>'input',	'data'=>''],
				
				'should_we_visit'=>['label'=>'Would you like us to visit you',		'value'=>'should_we_visit',	  'input'=>'radio',	'data'=>$this->answer],
				
				'become_a_member'=>['label'=>'Would you like to become our member','value'=>'become_a_member',	 'input'=>'radio',	'data'=>$this->answer],
				
				'see_pastor'=>['label'=>'Do you want to see Pastor',			'value'=>'see_pastor',		 'input'=>'radio',	'data'=>$this->answer],
				
				'prayer_request'=>['label'=>'Do you have any prayer request',		'value'=>'prayer_request',	 'input'=>'input',	'data'=>''],
				
		];
		
	}
	public function register(){
		//return array similar to birthday=>['input'=>input,'value'=>birthday,'data'=>]
		return $fields=[
				 'fullname'=>$this->listField()['fullname'],
				 'sex'=>$this->listField()['sex'],
				 'address'=>$this->listField()['address'],
				 'phone'=>$this->listField()['phone'],
				 'marital status'=>$this->listField()['marital_status'],
				 'age range'=>$this->listField()['age_range'],
				 'state_of_origin'=>$this->listField()['state_of_origin'],
				 'lga'=>$this->listField()['lga'],
				 'are you born again'=>$this->listField()['born_again'],
				 'email'=>$this->listField()['email'],
				 'password'=>$this->listField()['password'],
				 'password_confirmation'=>$this->listField()['password_confirmation'],
				
		];
	}
	public function member(){
		//return array similar to birthday=>['input'=>input,'value'=>birthday,'data'=>]
		return $fields=[
				 'passport'=>$this->listField()['passport'],
				 'birth day'=>$this->listField()['birthday'],
				 'cell'=>$this->listField()['cell'],
				 'service unit'=>$this->listField()['service_unit'],
				 'have you done water baptism'=>$this->listField()['water_baptism'],
				 'have you completed believer foundation'=>$this->listField()['believer_foundation'],
				
    ];
	}
	public function firsttimer(){
		//return array similar to birthday=>['input'=>input,'value'=>birthday,'data'=>]
		return $fields=[
				'are you on transit'=>$this->listField()['on_transit'],
				'transit duration'=> $this->listField()['transit_duration'],
				'should we visit you'=> $this->listField()['should_we_visit'],
				'would you like to become a member'=> $this->listField()['become_a_member'],
				'would you want to see pastor'=> $this->listField()['see_pastor'],
				'your prayer request'=> $this->listField()['prayer_request'],
				'cell'=> $this->listField()['cell'],
				
	];
	}
 public function login(){
	return $fields=[
		 'email'=>$this->listField()['email'],
		'password'=>$this->listField()['password'],
	]; 
 }
 }