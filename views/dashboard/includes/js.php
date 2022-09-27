<script >

    function showUserAddModal() {
        $('#user-modal').modal('show');
    }

function showLevelAddModal() {
    $('#level-modal').modal('show');
}




function changeLevel(id) {

    makeAjaxCall('getUserLevel?id=' + id).then(res => {
        level = res.data;

        $('#leveluser_id').val(level.id);
        $('#level_id').val(level.level_id);
        $('#changelevel-modal').modal('show');
    });

}


function showproductUpdateModal(id) {

    makeAjaxCall('getproduct?id=' + id).then(res => {
        product = res.data;
        $('#description').val(product.description);
        $('#name').val(product.name);
        $('#amount').val(product.amount);
        $('#product_id').val(product.id);
        $('#productupdatemodal').modal('show');
    });

}


function showLevelUpdateModal(id) {

    makeAjaxCall('getlevel?id=' + id).then(res => {
        level = res.data;
        $('#title').val(level.title);
        $('#amount').val(level.amount);
        $('#level_id').val(level.id);
        $('#updatelevel-modal').modal('show');
    });

}



function showSliderUpdateModal(id) {
    makeAjaxCall('getSlider?id=' + id).then(res => {
        slider = res.data;
        $('#heading').val(slider.heading);
        $('#text').val(slider.text);
        $('#slider_id').val(slider.id);
        $('#active').val(slider.active);
        $('#category_id').val(slider.category_id);
        $('#updateslider-modal').modal('show');
    });

}



function showSettingUpdateModal(id) {
    makeAjaxCall('getSetting?id=' + id).then(res => {
        setting = res.data;
        $('#email').val(setting.email);
        $('#phone').val(setting.phone);
        $('#footer').val(setting.footer);
        $('#brand_active').val(setting.brand);
        $('#cartmax_item').val(setting.cartmax_item);
        $('#setting_id').val(setting.id);
        $('#product').val(setting.product);
        $('#category').val(setting.category);
        $('#updatesetting-modal').modal('show');
    });

}

function showOrderDetails(Id) {
    makeAjaxCall('getOrder?order_id=' + Id).then(res => {
        order = res.data;
        $('#order-user-details').html(order.name + '<br>Invoice #' + order.id + '<br>' + order.created_at + '<br>' + order.address);

        order.cart_items.forEach(item => {
            let product = `
		<tr>
			<td>${item.name}</td>
             <td class="alignright">Rs ${item.unit_price*item.qty}</td>
        </tr>
		`;
            document.getElementById('order-products-list').innerHTML += product;
        });

        document.getElementById('order-products-list').innerHTML += `
	   <tr class="total">
          <td class="alignright" width="80%">Sub Total</td>
          <td class="alignright">Rs ${order.sub_total}</td>
       </tr>`;

        document.getElementById('order-products-list').innerHTML += `
	   <tr class="total">
          <td class="alignright" width="80%">Discount</td>
          <td class="alignright">Rs ${order.discount}</td>
       </tr>`;

        document.getElementById('order-products-list').innerHTML += `
	   <tr class="total">
          <td class="alignright" width="80%">Total</td>
          <td class="alignright">Rs ${order.total}</td>
       </tr>`;

    });

    $('#orderModal').modal('show');
}

function changeOrderStatus(id) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'changeOrderStatus',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                if (data == "successful") {
                    swal.fire({
                        title: "Approved!",
                        text: "order Approved Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == "unsuccessful") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}

function RejectOrder(id) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'RejectOrder',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                if (data == "successful") {
                    swal.fire({
                        title: "Approved!",
                        text: "order Approved Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == "unsuccessful") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}




function showCategoryUpdateModal(id) {
    makeAjaxCall('getCategory?id=' + id).then(res => {
        category = res.data;
        $('#category_name').val(category.category_name);
        $('#featured').val(category.featured);
        $('#description').val(category.description);
        $('#meta_title').val(category.meta_title);
        $('#category_id').val(category.id);
        $('#updatecategory-modal').modal('show');
    });

}


function showSubCategoryUpdateModal(id) {

    makeAjaxCall('getSubCategory?id=' + id).then(res => {
        subcategory = res.data;
        $('#subcategory_name').val(subcategory.name);
        $('#featured').val(subcategory.featured);
        $('#description').val(subcategory.description);
        $('#subcategory_id').val(subcategory.id);
        $('#updatesubcategory-modal').modal('show');
    });

}


function showRedeemUpdateModal(id) {
    makeAjaxCall('getRedeem?id=' + id).then(res => {
        redeem = res.data;
        $('#redeem_code').val(redeem.redeem_code);
        $('#user_id').val(redeem.user_id);
        $('#validity').val(redeem.validity);
        $('#redeem_id').val(redeem.id);
        $('#updateredeem-modal').modal('show');
    });

}


function showUserUpdateModal(id) {
    makeAjaxCall('getUser?id=' + id).then(res => {
        user = res.data;
        $('#user-name').val(user.name);
        $('#user-phone').val(user.phone);
        $('#user-email').val(user.email);
        $('#user-address').val(user.address);
        $('#user_id').val(user.id);
        $('#user_amount').val(user.min_amount);
        $('#update-modal').modal('show');
    });

}


function showCategoryAddModal() {
    $('#category-modal').modal('show');
}

function showSubCategoryAddModal() {

    $('#subcategory-modal').modal('show');
}




function deleteUser(userId) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'deleteUser',
            data: {
                userId: userId
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Deleted!",
                        text: "User Deleted Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == "0") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }
}




function deleteLevel(Id) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'deleteLevel',
            data: {
                Id: Id
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Deleted!",
                        text: "Level Deleted Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }
}



function deleteProduct(Id) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'deleteProduct',
            data: {
                Id: Id
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Deleted!",
                        text: "Product Deleted Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == "0") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }
}



function ApprovedPayment(id, userID) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'ApprovedPayment',
            data: {
                id: id,
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Approved!",
                        text: "Payment Approved Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}


function ApprovedRechargePayment(id, userID) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'ApprovedRechargePayment',
            data: {
                id: id,
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Approved!",
                        text: "Payment Approved Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}



function RejectRechargePayment(id, userID) {
		
    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'RejectRechargePayment',
            data: {
                id: id,
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Rejected!",
                        text: "Payment Rejected Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}




function RejectPayment(id, userID) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'RejectPayment',
            data: {
                id: id,
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Rejected!",
                        text: "Payment Rejected Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}



function ApprovedUser(userID) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'ApprovedUser',
            data: {
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Approved!",
                        text: "user Approved Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            },
			error: function(error) {
                console.log(error);
                    swal.fire({
                        title: "Error!",
                        text: error.statusText,
                        icon: "error",
              });
            }
        });
    }

}




function RejectedUser(userID) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'RejectedUser',
            data: {
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Rejected!",
                        text: "user Rejected Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}




function blockunblockUser(userID, status) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'blockunblockUser',
            data: {
                blockID: userID,
                status: status
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Block!",
                        text: "user UnBlocked Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "Block!",
                        text: "user Blocked Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == "unsuccessful") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}



function WarningToUser(userID) {

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: 'WarningToUser',
            data: {
                userID: userID
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    swal.fire({
                        title: "Notification!",
                        text: "Notification Send Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (data == 0) {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
            }
        });
    }

}




function makeAjaxCall(url, methodType = "GET") {
    //url=""+url;
    var promiseObj = new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();

        xhr.open(methodType, url, true);

        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log("xhr done successfully");
                    var resp = xhr.responseText;
                    console.log(resp);
                    var respJson = JSON.parse(resp);
                    if (respJson.status !== 200 && respJson.status !== 404) {
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

</script>