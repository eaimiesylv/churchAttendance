<?php
namespace App\Services;
class FirstTimerField extends Common{
	
	
	public function __construct(FormField $field){
		
		//generate field return address: {input type: 'input', x_model: 'address', id: 'address', name: 'address', data: '', …}
		$this->memberFields=$this->generateField($field->firsttimer());
		
		
	}
	
	
  }
	