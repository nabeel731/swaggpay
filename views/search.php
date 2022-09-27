<!DOCTYPE html>
<html lang="en">
  
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  
     <?php include_once'layout/head.php'; ?>
   <body>
     <?php include_once'layout/header.php'; ?>

      
      <div class="btmbar-part">
         <ul class="btmbar-widget">
            <li><a href="home-1.html"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li><a href="wishlist.html" class="wish-icon"><i class="fas fa-heart"></i><span>Wishlist</span><sup>0</sup></a></li>
            <li><a href="cartlist.html" class="cart-icon"><i class="fas fa-shopping-basket"></i><span>Cart</span><sup>0</sup></a></li>
            <li><a href="account.html"><i class="fas fa-cog"></i><span>Settings</span></a></li>
         </ul>
      </div>

      <section class="cart-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="cart-list">
                     <table class="table-list">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Product</th>
                              <th scope="col">Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
						
						<?php $i=0;  foreach($products as $product) { $i++; ?>
                           <tr>
                              <td class="table-number">
                                 <h5><?=$i?></h5>
                              </td>
                              <td class="table-product"><img src="<?=$product['thumbnail_img'] ? $product['thumbnail_img'] : 'assets/img/product/Tuna-fish-large.jpg';?>" alt="product-1"></td>
                              <td class="table-name">
                                 <h5><?=$product['name']?></h5>
                              </td>
                              <td class="table-price">
                                 <h5>₹<?=round($product['unit_price']-($product['unit_price']*$product['discount']/100),0)?></h5>
                              </td>
                              <td class="table-quantity"><input type="number" value="1" placeholder="1"></td>
                              <td class="table-total">
                                 <h5>₹<?=round($product['unit_price']-($product['unit_price']*$product['discount']/100),0)?></h5>
                              </td>
                              <td class="table-action">
							  <!--<a href="#"> <i class="fas fa-eye"></i> </a>
							  <a href="#"><i class="fas fa-trash-alt"></i></a>-->
							  						   <div class="row">
								<div class="col-12">
									<div class="plusMinus-div" id="plusMnusBtn_<?=$product['id']?>">
										<button  class="plusMinus-btn" onClick="decreaseQty(<?=$product['id']?>)">-</button>
										<button class="plusMinus-btn product-qty" id="product_qty_<?=$product['id']?>"><?=$product['min_qty']?></button>
										<button class="plusMinus-btn" onClick="increaseQty(<?=$product['id']?>)">+</button>
									</div>
								</div>
							</div>
                           <div class="product-btn" id="addCartBtn_<?=$product['id']?>">
								<a href="#" <?=$product['current_stock'] < $product['min_qty'] ? 'disabled' : ''?> onClick="addToCart(<?=$product['id']?>,<?=$product['min_qty']?>)"><i class="fas fa-shopping-basket"></i><span>Add to Cart</span></a>
						   </div>
							  </td>
                           </tr>
						<?php } ?>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
           
      
            </div>
         </div>
      </section>

         <?php include_once'layout/footer.php'; ?>

   <?php include_once'layout/scripts.php'; ?>
   </body>
</html>