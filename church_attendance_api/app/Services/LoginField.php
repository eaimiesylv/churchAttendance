<?php
namespace App\Services;
//loginFields
class LoginField extends Common{
	
	
	
	
	public function __construct(FormField $field){
		
		//generate field return address: {input type: 'input', x_model: 'address', id: 'address', name: 'address', data: '', …}
		
		$this->loginFormFields=$this->generateField($field->login());
		
	}
  }