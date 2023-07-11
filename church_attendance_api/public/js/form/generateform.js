function generateAlphineForm(page="full width", json){
    let field=" ";
    let width ="<div class='mt-3 col-md-8 offset-md-2'>"
    if(page == 'register'){
       field +="<div class='row'>";
       width ="<div class='mt-3 col-md-5 offset-md-1'>"
    }
    //outsideKeys is the main form array which is either  loginField or registerFormField
    for(outsideKeys in json){
             //formData is an object of all the form field
              let formData=json[outsideKeys]
            //innerKeys are the individual form field such as sex,email,fullname,address
               for(innerKeys in formData){
                   let formtype=formData[innerKeys]['input type'];
                   field +=`${width}`;
                   field +=`<div style="color:blue">${formData[innerKeys]['label']}</div>`;
                    switch(formtype){
                      case "input":
                      case "email":
                      case "file" :
                      case "checkbox":
					   case "number":
                      case "password":  
                      field +=input(formData, innerKeys)
                      break;
                      case "select":  
                      field +=select(formData, innerKeys)
                      break;
                      case "radio":  
                      field +=radio(formData, innerKeys)
                      break;
                      default:
                      //console.log(formtype)
                    }
                    field +=`<span x-show="err.${formData[innerKeys]['id']}" class="btn-danger mt-1">`
                    //this out put the error content
                     field +=`<span x-text="err.${formData[innerKeys]['id']}">
                           </span> `
                field +="</div>";
               }
            }
      if(page == 'login'){
        field +="</div>";  
      }
        return field;
}