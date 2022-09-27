function makeAjaxCall(url,methodType="GET"){
    //url=""+url;
   var promiseObj = new Promise(function(resolve, reject){
      var xhr = new XMLHttpRequest();
	
      xhr.open(methodType, url, true);
	
	 xhr.send();
      xhr.onreadystatechange = function(){
      if (xhr.readyState === 4){
         if (xhr.status === 200){
            console.log("xhr done successfully");
            var resp = xhr.responseText;
			console.log(resp);
            var respJson = JSON.parse(resp);
			if(respJson.status!==200 && respJson.status!==404)
			{
				Swal.fire(
				'Error!',
				respJson.message,
				'error'
				);
				return false;
			}
			
            resolve(respJson);
         } else {
            reject(xhr.status);
            console.log("xhr failed");
         }
      } else {
         console.log("xhr processing going on");
      }
   };
   console.log("request sent succesfully");
 });
 return promiseObj;
}


