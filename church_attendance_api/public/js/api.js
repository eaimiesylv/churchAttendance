let url="http://localhost/api";
async function getMethod(url) {
    return await fetch(`${url}`)
      .then(response => response.json())
      .catch(e => {
        console.log("This is a fetchData method error. Either from the API or the .then result");
        console.log(e);
      });
  }
  function initalializationForm(formField){
      let form={};
      Object.keys(formField).forEach(key => {
        let userKey=formField[key]['x_model'];
        form[userKey]='';
    });
    //return form;
  }
      
  
/*submitForm(e){
           
    //fetch('http://localhost:8000/api/login', {
      let user = {
        email: this.email,
         password: this.password
      };
      
      fetch('http://localhost:8000/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(user)
      }).then(response => response.json())
      .then(data => {
        // window.location.href = "http://localhost:8000/register"
         console.log(data)
      }).catch(e=>{
        console.log(e)
      });
      
      
   
}
*/
