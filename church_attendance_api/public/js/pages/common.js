//this append the generated page content on the dom
function data(pageUrl){
	let commonUrl="http://localhost/api";
	url=commonUrl+"/"+pageUrl;
	return {
          renderPage: null,
          field_input:{},
          err:'',
          fetchData:async function(error) {
				//allData returns the html code to be rendered and errors
				let pageDetail=await allData(error, url);
				this.renderPage=pageDetail[0];
				//console.log(this.renderPage);
				this.err=pageDetail[1];
				console.log(this.err);
			
		},
          
       
      }
}

async function allData(error = '', url,page_width) {
  let err='';
  try {
    const json = await getMethod(url);
	if (Object.keys(json).length === 0) {
      alert('Server error');
      return;
    }
    if (error !== '') {
		
       err=error;
    }
    let generatedHtmlCode=generateAlphineForm(page_width, json);
	//console.log(generatedHtmlCode);
	return [generatedHtmlCode, err];
  } catch (e) {
    console.log("Error:", e);
  }
}

async function getMethod(url) {
    return await fetch(`${url}`)
      .then(response => response.json())
      .catch(e => {
        console.log("This is a fetchData method error. Either from the API or the .then result"+ url);
        console.log(e);
      });
  }
  

 /* function initalializationForm(formField){
      let form={};
      Object.keys(formField).forEach(key => {
        let userKey=formField[key]['x_model'];
        form[userKey]='';
    });
    //return form;
  }
  //fetchMemberData(error='',url) 

function allData(error = '', url) {
  return getMethod(url)
    .then(json => {
      return generateAlphineForm('register', json);
    })
    .catch(e => {
      console.log("Error:", e);
    });
}
*/
/*
function errors(error){
	     console.log(error);
		   return error;
          let err=[];
		   for(key in error){
		      let t= {[key]:error[key]};
			  err={...err,...t}
		   }
		   return err;
		   	//console.log(error);
           let err=[];
		   error.forEach(function(item, index, array) {      
            let key=Object.keys(item);
            let value=array[index][key];
            let t= {[key]:value};
            console.log(item);
            err={...err,...t}
           
          });
		   return err;
}
*/
