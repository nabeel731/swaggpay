
function addToCart(id,quantity=1,section=null){
	event.preventDefault()
	if(!id)
		id=$('#quickview-product-id').val();
	
	//if(section)
		//quantity=$('#'+section+'-modal-number-'+id).val();
	
	if(!quantity && location.href.includes("wishlist"))
		quantity=$('#modal-number-'+id).val();
	else if(!quantity)
		quantity=$('#modal-number').val();
	
	let input = Object.create( {} );
	input.product_id=id;
	input.qty=quantity;
	
	//$('#modalQuickView').modal('hide');
  makePostAjaxCall("addToCart",input).then(res=> {
		let cartItem=res.data;
		let count=parseFloat($("#cart-items-count").text());
		count+=1;
		$("#cart-items-count").text(count);
		//$("#cart-item-count-mobile").text(count);
		//$("#new-cart-count").text(count);
		
		// HIDE ADD TO CART BTN AND SHOW QUANTITY BUTTONS
		if(section)
		{	
			$("#addCartBtn_"+section+"_"+id).css("display","none");
			$("#plusMnusBtn_"+section+"_"+id).css("display","inline-block");
		}
		else
		{
			$("#addCartBtn_"+id).css("display","none");
			$("#plusMnusBtn_"+id).css("display","inline-block");
		}
		
  });
   
}



function increaseQty(id,section=null){
	  makeAjaxCall("increaseQty?product_id="+id).then(res=> {
		  let item=res.data;
		console.log(item);
		  if(section && section!==null)
			$("#product_qty_"+section+"_"+id).text(item.qty);
		  else
			$("#product_qty_"+id).text(item.qty);
	
	  });
  }
  
  
  
  function decreaseQty(id,section=null){
	  
	  makeAjaxCall("decreaseQty?product_id="+id).then(res=> {
		  let item=res.data;
		  if(item.qty>0)
		  {
			if(section)
				$("#product_qty_"+section+"_"+id).text(item.qty);
			else
				$("#product_qty_"+id).text(item.qty);
		  }
		  else
		  {
			  if(section)
			  {
				$("#addCartBtn_"+section+"_"+id).css("display","block");
				$("#plusMnusBtn_"+section+"_"+id).css("display","none");
			  }
			  else
			  {
				$("#addCartBtn_"+id).css("display","block");
				$("#plusMnusBtn_"+id).css("display","none");
			  }
			  
			  let count=parseFloat($("#cart-items-count").text()-1);
			  $("#cart-items-count").text(count);
			  //$("#cart-item-count-mobile").text(count);
		  }
			  
			
		 
	  });
  }