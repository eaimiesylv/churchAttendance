let urlss="http://localhost:8000/api/register/firsttimerfield";
function firstTimerData() {
		
        return {
          firstTimerPage: null,
          err:'',
          //field_input is a x_model attribute found in controller
          field_input:{},
         
         fetchfirstTimerData(error='') { 
            //console.log(urlss);
            //this method retrieved the form field. It is called from api.js
              getMethod(urlss).then(json => {
				
				  if(Object.keys(json).length === 0){
					  alert('Server error')
					  return
					}
               
				  //console.log(initalializationForm(json));
					 this.firstTimerPage=generateAlphineForm('register',json);
					// console.log(this.renderMemberPage)
                
                if(error !== ''){
                   this.errors(error);
                 
                }
              }).catch(e => {
                console.log("Error:", e);
              });
              

          },
        errors(error){
          let merge=[];
          error.forEach(function(item, index, array) {      
            let key=Object.keys(item);
            let value=array[index][key];
            let t= {[key]:value};
            console.log(item);
           
           
            merge={...merge,...t}
           
          });
          this.err=merge;
        }
      }
    };