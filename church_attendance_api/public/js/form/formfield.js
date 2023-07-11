//innerKeys are the individual form field such as sex,email,fullname,address
//ex of FormData value is email:{input type: 'input', x_model: 'email', id: 'email', name: 'email', label: 'Email',data: Array(2), …}
function input(formData, innerKeys){
    let field="";
    field +="<input";
    //type
    field +=' type="';
    field +=formData[innerKeys]['input type'];
    field +='"';
    
    // x-model
   // field += `'x-model=${formData[innerKeys]['x_model']}`;
    field +=' x-model= "';
    field +=`field_input.${formData[innerKeys]['x_model']}`;
    field += '"';
    //id
    field +=' id="';
    field +=formData[innerKeys]['id'];
    field +='"';
    //name
    field +=' name="';
    field +=formData[innerKeys]['name'];
    field +='"';
    //class and error
    field +=' class="';
    field +=formData[innerKeys]['attributes']['class'];
    field +='"';
	
	//required
	field +=formData[innerKeys]['attributes']['required'];
    field +=">";
  
    return field;

  }
function select(formData, innerKeys){
    //console.log(formData[innerKeys]['data']);
    let field="";
    field +="<select name="+ formData[innerKeys]['name'] +" class='form-control'>";
    for(option in formData[innerKeys]['data']){
      
      field +=`<option value='${formData[innerKeys]['data'][option]['value']}'>${formData[innerKeys]['data'][option]['select']}</option>`;
    }  
    field +='</select>'
    return field

  }
function radio(formData, innerKeys){
 
  //console.log(innerKeys);
  
    let field="";
      for(option in formData[innerKeys]['data']){
      field += ` <input type=radio name=${formData[innerKeys]['name']} value='${formData[innerKeys]['data'][option]['value']}'> ${formData[innerKeys]['data'][option]['radio']}`
      } 
    
      return field
}
