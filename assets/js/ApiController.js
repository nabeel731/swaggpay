//const baseURL="../";

function makePostAjaxCall(url,params,$type="json"){
	//url=baseURL+url;
	var promiseObj = new Promise(function(resolve, reject){
		
		var xhr = new XMLHttpRequest();
		xhr.open("POST",url, true);
		xhr.setRequestHeader("Accept", "application/json");
		xhr.setRequestHeader("Content-type", "application/json;charset=UTF-8");
		if($type=="json")
			xhr.send(JSON.stringify(params));
		else
			xhr.send(params);
		 xhr.onreadystatechange = function(){
      if (xhr.readyState === 4){
         if (xhr.status === 200){
            //console.log("xhr done successfully");
            var resp = xhr.responseText;
            console.log(resp);
            var respJson = JSON.parse(resp);
			if(respJson.status!==200 && respJson.status!==401 )
			{
				let title="Error";
				let icon="error";
				if(respJson.status==100)
				{
					title="Bucket is Empty";
					icon="warning"
				}
				
				Swal.fire(
				title,
				respJson.message,
				icon
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
	 });
	 return promiseObj;
}



function makeAjaxCall(url,methodType="GET"){
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
			if(respJson.status!==200)
			{
				let title="Error";
				let icon="error";
				if(respJson.status==100)
				{
					title="Bucket is empty";
					icon="warning"
				}
				
				Swal.fire(
				title,
				respJson.message,
				icon
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

function errorHandler(statusCode){
 console.log("failed with status", status);
}