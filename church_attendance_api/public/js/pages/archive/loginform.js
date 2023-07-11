url=url+"/login";
function data() {
        return {
          renderLoginPage: null,
          field_input:{},
          err:'',
          fetchData:async function(error) {
				//allData is from common.js
				let pageDetail=await allData(error, url);
				this.renderLoginPage=pageDetail[0];
				this.err=pageDetail[1];
			
		},
          
       
      }
    };