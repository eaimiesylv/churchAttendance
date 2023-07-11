<?php
namespace App\Services;
class Common{
	
	 private $common_attributes = [
        'required' => '',
        'class' => 'form-control',
        'autofocus' => 'autofocus',
    ];
	 public function generateField(array $fieldKeys): array
    {
		//this return address: {input type: 'input', x_model: 'address', id: 'address', name: 'address', data: '', …}
        $formFields = [];
        //dd($fieldKeys);
        foreach ($fieldKeys as $key => $value) {
            $field = [
                'input type' => $value['input'],
                'x_model' => $value['value'],
                'id' => $value['value'],
                'name' => $value['value'],
                'data' => $value['data'],
                'label' => __(ucfirst($key)),
                'attributes' => $this->common_attributes,
            ];

            $formFields[$value['value']] = $field;
        }

        return $formFields;
    }
	/*
    protected function createField(string $inputType, string $value, $data): array
    {
        return [
            'input' => $inputType,
            'value' => $value,
            'data' => $data,
        ];
    }

   

	public function createFormField($fieldkeys){
		$formFields=[];
		foreach($fieldkeys as $key){
			
			$formFields[$key['label']] = $this->createField($key['type'], $key['value'], $key['data']);
		}
		return $formFields;
		
		
	}*/
  }
	