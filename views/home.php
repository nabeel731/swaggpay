<!DOCTYPE html>
<html lang="en">

   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <?php 
 
   include_once'layout/head.php'; ?>
   <body>
   
   
   
      <?php include_once'layout/header.php'; ?>
   
      
      <div class="btmbar-part">
         <ul class="btmbar-widget">
            <li><a href="home-1.html"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li><a href="singles/wishlist.html" class="wish-icon"><i class="fas fa-heart"></i><span>Wishlist</span><sup>0</sup></a></li>
            <li><a href="singles/cartlist.html" class="cart-icon"><i class="fas fa-shopping-basket"></i><span>Cart</span><sup>0</sup></a></li>
            <li><a href="singles/account.html"><i class="fas fa-cog"></i><span>Settings</span></a></li>
         </ul>
      </div>
      <main class="banner-part slider-arrow slider-dots">
	  
		<?php foreach($sliders as $slider) { ?>
         <section class="banner-1" style="background: url('<?=$slider['image']?>')" >
            <div class="container">
               <div class="row">
                  <div class="col-md-5 col-lg-6"></div>
                  <div class="col-md-7 col-lg-6">
                     <div class="banner-content-2">
                        <h1><?=$slider['heading']?></h1>
                        <p style="color:white; background-color:black"><?=$slider['description']?></p>
                        <a class="btn btn-inline" href=""><i class="fas fa-shopping-basket"></i><span>shop now</span></a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		<?php } ?>
         
      
      </main>
      <section class="section trend-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-heading">
                     <h2 class="title">Trending products</h2>
                     <a href="singles/product-list-1.html" class="btn btn-outline"><i class="fas fa-eye"></i>show more</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="product-slider slider-arrow">
				  
				  
                     <?php foreach($data['products'] as $product) { ?>
                     <div class="product-card">
                        <div class="product-img">
						<?php if($product['current_stock']<$product['min_qty']){?>
					 <span class="product__label product__label--sale-dis">Stock Out</span>
					 <?php } ?>
					  <div class="product-rating product__rating"><i class="fas fa-star"></i><span>4.5/2</span></div>
                           <a href="product-details?id=<?=$product['id']?>"><img src="<?= $product['thumbnail_img']? $product['thumbnail_img'] : 'assets/img/product/salmon.jpg'?>" alt="product-1"></a>
                           <ul class="product-widget">
                              <li><a href="product-details?id=<?=$product['id']?>"><button><i class="fas fa-eye"></i></button></a></li>
                              <li><button><i class="fas fa-heart"></i></button></li>
                              <li><button><i class="fas fa-exchange-alt"></i></button></li>
                           </ul>
                        </div>
                        <div class="product-content">
                           <div class="product-name row">
								<div class="<?=$product['unit_price']>100 ? 'col-6' : 'col-7'?>">
									<h6><a href="#"><?=$product['name']?></a></h6>
								</div>
                                <div class="<?=$product['unit_price']>100 ? 'col-6' : 'col-5'?>">
								  <div class="product-price">
										<h6> <?php if($product['discount']>0){ ?> <del>₹<?=$product['unit_price']?></del> <?php } ?>  ₹ <?=round($product['unit_price']-($product['unit_price']*$product['discount']/100),0)?> </h6>
                          
									</div>
								</div>
						   </div>
                           
						   <div class="row">
							 <div class="col-12">
								<div class="variable-div" style="margin-top:-40px;">
									<?php if(!empty($product['weights'][0])) { foreach ($product['weights'] as $weight) { ?>
									<button  class="variable-btn" style="border:2px solid  green;"><?=$weight?><?=$product['unit']?></button>
									<?php } } ?>
									
								</div>
							 </div>
						  </div>
						   <div class="row">
								<div class="col-12">
									<div class="plusMinus-div" id="plusMnusBtn_<?=$product['id']?>">
										<button  class="plusMinus-btn" onClick="decreaseQty(<?=$product['id']?>)">-</button>
										<button class="plusMinus-btn product-qty" id="product_qty_<?=$product['id']?>"><?=$product['min_qty']?></button>
										<button class="plusMinus-btn" onClick="increak8seQty(<?=$product['id']?>)">+</button>
									</div>
								</div>
							</div>
							
                           <div class="product-btn" id="addCartBtn_<?=$product['id']?>">
								<a href="#" <?=$product['current_stock'] < $product['min_qty'] ? 'disabled' : ''?> onClick="addToCart(<?=$product['id']?>,<?=$product['min_qty']?>)"><i class="fas fa-shopping-basket"></i><span>Add to Cart</span></a>
						   </div>
                        </div>
                     </div>
					 
					<?php } ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section best-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-heading">
                     <h2 class="title">Best selling products</h2>
                     <a href="singles/product-list-1.html" class="btn btn-outline"><i class="fas fa-eye"></i>show more</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="product-slider slider-arrow">
				  
				  
                    <?php foreach($data['products'] as $product) { ?>
                     <div class="product-card">
                        <div class="product-img">
						<?php if($product['current_stock']<$product['min_qty']){?>
					 <span class="product__label product__label--sale-dis">Stock Out</span>
					 <?php } ?>
					  <div class="product-rating product__rating"><i class="fas fa-star"></i><span>4.5/2</span></div>
                           <img src="<?= $product['thumbnail_img']? $product['thumbnail_img'] : 'assets/img/product/salmon.jpg'?>" alt="product-1">
                           <ul class="product-widget">
                              <li><button><i class="fas fa-eye"></i></button></li>
                              <li><button><i class="fas fa-heart"></i></button></li>
                              <li><button><i class="fas fa-exchange-alt"></i></button></li>
                           </ul>
                        </div>
                        <div class="product-content">
                                 <div class="product-name row">
								<div class="<?=$product['unit_price']>100 ? 'col-6' : 'col-7'?>">
									<h6><a href="#"><?=$product['name']?></a></h6>
								</div>
                                <div class="<?=$product['unit_price']>100 ? 'col-6' : 'col-5'?>">
								  <div class="product-price">
										<h6> <?php if($product['discount']>0){ ?> <del>₹<?=$product['unit_price']?></del> <?php } ?>  ₹ <?=round($product['unit_price']-($product['unit_price']*$product['discount']/100),0)?> </h6>
                          
									</div>
								</div>
						   </div>
						   <div class="row">
							<div class="col-12">
								<div class="variable-div" style="margin-top:-40px;">
									<?php if(!empty($product['weights'][0])) { foreach ($product['weights'] as $weight) { ?>
									<button  class="variable-btn" style="border:2px solid  green;"><?=$weight?><?=$product['unit']?></button>
									<?php } } ?>
									
								</div>
							 </div>
						  </div>
						   <div class="row">
								<div class="col-12">
									<div class="plusMinus-div" id="plusMnusBtn_best_<?=$product['id']?>">
										<button  class="plusMinus-btn" onClick="decreaseQty(<?=$product['id']?>,'best')">-</button>
										<button class="plusMinus-btn product-qty" id="product_qty_best_<?=$product['id']?>"><?=$product['min_qty']?></button>
										<button class="plusMinus-btn" onClick="increaseQty(<?=$product['id']?>,'best')">+</button>
									</div>
								</div>
							</div>
						<div class="product-btn" id="addCartBtn_best_<?=$product['id']?>">
								<a href="#" <?=$product['current_stock'] < $product['min_qty'] ? 'disabled' : ''?> onClick="addToCart(<?=$product['id']?>,<?=$product['min_qty']?>,'best')"><i class="fas fa-shopping-basket"></i><span>Add to Cart</span></a>
						   </div>
                        </div>
                     </div>
					 
					<?php } ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section new-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-heading">
                     <h2 class="title">New products</h2>
                     <a href="singles/product-list-1.html" class="btn btn-outline"><i class="fas fa-eye"></i>show more</a>
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                  <div class="product-slider slider-arrow ">
				  
				  
					<?php foreach($data['products'] as $product) { ?>
                     <div class="product-card">
                        <div class="product-img">
						<?php if($product['current_stock']<$product['min_qty']){?>
					 <span class="product__label product__label--sale-dis">Stock Out</span>
					 <?php } ?>
					 <div class="product-rating product__rating"><i class="fas fa-star"></i><span>4.5/2</span></div>
                           <img src="<?= $product['thumbnail_img']? $product['thumbnail_img'] : 'assets/img/product/salmon.jpg'?>" alt="product-1">
                           <ul class="product-widget">
                              <li><button><i class="fas fa-eye"></i></button></li>
                              <li><button><i class="fas fa-heart"></i></button></li>
                              <li><button><i class="fas fa-exchange-alt"></i></button></li>
                           </ul>
                        </div>
                        <div class="product-content">
                          <div class="product-name row">
								<div class="<?=$product['unit_price']>100 ? 'col-6' : 'col-7'?>">
									<h6><a href="#"><?=$product['name']?></a></h6>
								</div>
                                <div class="<?=$product['unit_price']>100 ? 'col-6' : 'col-5'?>">
								  <div class="product-price">
										<h6> <?php if($product['discount']>0){ ?> <del>₹<?=$product['unit_price']?></del> <?php } ?>  ₹ <?=round($product['unit_price']-($product['unit_price']*$product['discount']/100),0)?> </h6>
                          
									</div>
								</div>
						   </div>
						   <div class="row">
								<div class="col-12">
								<div class="variable-div" style="margin-top:-40px;">
									<?php if(!empty($product['weights'][0])) { foreach ($product['weights'] as $weight) { ?>
									<button  class="variable-btn" style="border:2px solid  green;"><?=$weight?><?=$product['unit']?></button>
									<?php } } ?>
									
								</div>
							 </div>
						  </div>
						   <div class="row">
								<div class="col-12">
									<div class="plusMinus-div" id="plusMnusBtn_new_<?=$product['id']?>">
										<button  class="plusMinus-btn" onClick="decreaseQty(<?=$product['id']?>,'new')">-</button>
										<button class="plusMinus-btn product-qty" id="product_qty_new_<?=$product['id']?>"><?=$product['min_qty']?></button>
										<button class="plusMinus-btn" onClick="increaseQty(<?=$product['id']?>,'new')">+</button>
									</div>
								</div>
							</div>
						<div class="product-btn" id="addCartBtn_new_<?=$product['id']?>">
								<a href="#" <?=$product['current_stock'] < $product['min_qty'] ? 'disabled' : ''?> onClick="addToCart(<?=$product['id']?>,<?=$product['min_qty']?>,'new')"><i class="fas fa-shopping-basket"></i><span>Add to Cart</span></a>
						   </div>
                        </div>
                     </div>
					 
					<?php } ?>
					
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section blog-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-heading">
                     <h2 class="title">Our latest blogs</h2>
                     <a href="singles/blog-list-1.html" class="btn btn-outline"><i class="fas fa-eye"></i>show more</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-lg-8">
                  <div class="blog-slider slider-arrow">
                     <div class="blog-card">
                        <div class="blog-img"><img src="assets/img/blog/01.jpg" alt="blog-1"></div>
                        <div class="blog-content">
                           <ul class="blog-meta">
                              <li><i class="far fa-calendar-alt"></i><span>02 feb 2020</span></li>
                              <li><i class="far fa-comments"></i><span>18 comments</span></li>
                           </ul>
                           <div class="blog-text">
                              <h3><a href="#">How to Make Your Breakfast Easy and Yummy...</a></h3>
                           </div>
                           <div class="read-btn"><a href="#">read more <i class="fas fa-arrow-right"></i></a></div>
                        </div>
                     </div>
                     <div class="blog-card">
                        <div class="blog-img"><img src="assets/img/blog/02.jpg" alt="blog-2"></div>
                        <div class="blog-content">
                           <ul class="blog-meta">
                              <li><i class="far fa-calendar-alt"></i><span>02 feb 2020</span></li>
                              <li><i class="far fa-comments"></i><span>18 comments</span></li>
                           </ul>
                           <div class="blog-text">
                              <h3><a href="#">How to Make Your Breakfast Easy and Yummy...</a></h3>
                           </div>
                           <div class="read-btn"><a href="#">read more <i class="fas fa-arrow-right"></i></a></div>
                        </div>
                     </div>
                     <div class="blog-card">
                        <div class="blog-img"><img src="assets/img/blog/03.jpg" alt="blog-3"></div>
                        <div class="blog-content">
                           <ul class="blog-meta">
                              <li><i class="far fa-calendar-alt"></i><span>02 feb 2020</span></li>
                              <li><i class="far fa-comments"></i><span>18 comments</span></li>
                           </ul>
                           <div class="blog-text">
                              <h3><a href="#">How to Make Your Breakfast Easy and Yummy...</a></h3>
                           </div>
                           <div class="read-btn"><a href="#">read more <i class="fas fa-arrow-right"></i></a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4">
                  <div class="side-blog">
                     <div class="blog-list">
                        <div class="blog-list-img"><img src="assets/img/blog/list-1.jpg" alt="blog-list-1"></div>
                        <div class="blog-list-content">
                           <ul class="blog-meta">
                              <li><i class="far fa-calendar-alt"></i><span>02 feb 2020</span></li>
                              <li><i class="far fa-comments"></i><span>18 comments</span></li>
                           </ul>
                           <div class="blog-text">
                              <h3><a href="#">How to Make Your Breakfast Easy and Yummy...</a></h3>
                           </div>
                        </div>
                     </div>
                     <div class="blog-list">
                        <div class="blog-list-img"><img src="assets/img/blog/list-2.jpg" alt="blog-list-2"></div>
                        <div class="blog-list-content">
                           <ul class="blog-meta">
                              <li><i class="far fa-calendar-alt"></i><span>02 feb 2020</span></li>
                              <li><i class="far fa-comments"></i><span>18 comments</span></li>
                           </ul>
                           <div class="blog-text">
                              <h3><a href="#">How to Make Your Breakfast Easy and Yummy...</a></h3>
                           </div>
                        </div>
                     </div>
                     <div class="blog-list">
                        <div class="blog-list-img"><img src="assets/img/blog/list-3.jpg" alt="blog-list-3"></div>
                        <div class="blog-list-content">
                           <ul class="blog-meta">
                              <li><i class="far fa-calendar-alt"></i><span>02 feb 2020</span></li>
                              <li><i class="far fa-comments"></i><span>18 comments</span></li>
                           </ul>
                           <div class="blog-text">
                              <h3><a href="#">How to Make Your Breakfast Easy and Yummy...</a></h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="feature-part">
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-lg-4">
                  <div class="feature-card">
                     <i class="flaticon-delivery-truck"></i>
                     <h3>Free Delivery</h3>
                     <p>Tempora odio reiciendis incidunt tenetur deserunt dolores autem beatae</p>
                  </div>
               </div>
               <div class="col-md-4 col-lg-4">
                  <div class="feature-card">
                     <i class="flaticon-save-money"></i>
                     <h3>Instant Return</h3>
                     <p>Tempora odio reiciendis incidunt tenetur deserunt dolores autem beatae</p>
                  </div>
               </div>
               <div class="col-md-4 col-lg-4">
                  <div class="feature-card">
                     <i class="flaticon-customer-service"></i>
                     <h3>Quick Support</h3>
                     <p>Tempora odio reiciendis incidunt tenetur deserunt dolores autem beatae</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php include_once'layout/footer.php'; ?>
   </body>
    <?php include_once('layout/responses.php'); ?>
  <?php include_once'layout/scripts.php'; ?>
</html>