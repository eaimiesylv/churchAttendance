url=url+"/register";
function data() {
        return {
          renderRegisterPage: null,
          err:'',
          field_input:{},
          fetchData:async function(error) {
				//allData is from common.js
				let pageDetail=await allData(error, url,'register');
				console.log(pageDetail)
				this.renderRegisterPage=pageDetail[0];
				this.err=pageDetail[1];
				
		  },
          
       
      }
    };