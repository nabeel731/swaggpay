<?php
$db=new DB();
$categories=$db->getMultipleRowsIfMatch('categories','deleted',0);
	$subcategories=$db->getMultipleRowsIfMatch('sub_categories','deleted',0);
	
	$res=[];
	for($i=0;$i<sizeof($categories);$i++)
	{
		$j=0;
		$categories[$i]['subcategories']=array();
		foreach($subcategories as $subcategory){
			if($subcategory['category_id']==$categories[$i]['id'])
			{
				$categories[$i]['subcategories'][$j]=$subcategory;
				$j++;
			}
		}
	}

?>
 
 <header class="header-part">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-6 col-lg-6">
                  <ul class="header-info">
                     <li>
                        <i class="fas fa-envelope"></i>
                        <p>info@kashmirtrout.com</p>
                     </li>
                     <li>
                        <i class="fas fa-phone-alt"></i>
                        <p>+19027953213</p>
                     </li>
                  </ul>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="header-option">
                     <div class="header-curr">
                        <i class="fas fa-money-bill"></i>
                        <select class="header-select custom-select">
                           <option class="clr" selected>currency</option>
                           <option class="clr" value="1">Dollers</option>
                           <option class="clr" value="2">Inr</option>
                        
                        </select>
                     </div>
                     <div class="header-lang">
                        <i class="fas fa-globe"></i>
                        <select class="header-select custom-select">
                           <option class="clr" selected>language</option>
                           <option class="clr" value="1">English</option>
                           <option class="clr" value="2">Hindi</option>
                        
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
	  <nav class="navbar-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="navbar-element">
                     <ul class="left-widget">
                        <li><a class="icon icon-inline menu-bar" href="#"><i class="fas fa-align-left"></i></a></li>
                     </ul>
                     <a class="navbar-logo" href="home"><img src="assets/img/logo/logo.png" alt="logo"></a>
                     <form action="search" class="search-form navbar-src"><input name="q" type="text" placeholder="Search anything..."><button class="btn btn-inline"><i class="fas fa-search"></i><span>search</span></button></form>
                     <ul class="right-widget">
                        <li><a class="icon icon-inline" href="auth"><i class="fas fa-user"></i></a></li>
                        <li><a class="icon icon-inline" href="wishlist"><i class="fas fa-heart"></i><sup>0</sup></a></li>
                        <li><a class="icon icon-inline" href="cartlist"><i class="fas fa-shopping-cart"></i><sup id="cart-items-count">0</sup></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="navbar-slide">
                     <div class="navbar-content">
                        <div class="navbar-slide-cross"><a class="icon icon-inline cross-btn" href="#"><i class="fas fa-times"></i></a></div>
                        <div class="navbar-slide-logo"><a href="#"><img src="assets/img/logo/logo.png" alt="logo"></a></div>
                        <form class="search-form mb-4 navbar-slide-src"><input type="text" placeholder="Search anything..."><button class="btn btn-inline"><i class="fas fa-search"></i><span>search</span></button></form>
                        <ul class="navbar-list">
                           <li class="navbar-item active"><a class="navbar-link" href="home">Home</a></li>
                           <li class="navbar-item navbar-dropdown navbar-megamenu">
                              <a class="navbar-link dropdown-indicator" href="#"><span>Categories</span><i class="fas fa-chevron-down"></i></a>
                              <div class="megamenu">
                                 <ul>
								 <?php foreach($categories as $category) { ?>
									<li><a href="#"><i class="flaticon-groceries"></i><span><?=$category['name']?></span></a></li>
								 <?php }?>
                                    <!--<li><a href="#"><i class="flaticon-groceries"></i><span>Groceries (17)</span></a></li>
                                    <li><a href="#"><i class="flaticon-bread"></i><span>bakery (23)</span></a></li>
                                    <li><a href="#"><i class="flaticon-vegetable"></i><span>vegetables (42)</span></a></li>
                                    <li><a href="#"><i class="flaticon-healthy-food"></i><span>fruits (14)</span></a></li>
                                    <li><a href="#"><i class="flaticon-salad"></i><span>salads (21)</span></a></li>
                                    <li><a href="#"><i class="flaticon-drinks"></i><span>drinks (36)</span></a></li>
                                    <li><a href="#"><i class="flaticon-seaweed"></i><span>seaweeds (14)</span></a></li>
                                    <li><a href="#"><i class="flaticon-nuts"></i><span>nuts (22)</span></a></li>
                                    <li><a href="#"><i class="flaticon-marmite"></i><span>Nutrition (18)</span></a></li>
                                    <li><a href="#"><i class="flaticon-cereal"></i><span>cereal (54)</span></a></li>
                                    <li><a href="#"><i class="flaticon-tofu"></i><span>tofu (17)</span></a></li>
                                    <li><a href="#"><i class="flaticon-peas"></i><span>Legumes (43)</span></a></li>
                                    <li><a href="#"><i class="flaticon-spread"></i><span>Seeds (36)</span></a></li>
                                    <li><a href="#"><i class="flaticon-cheese"></i><span>cheeses (68)</span></a></li>
                                    <li><a href="#"><i class="flaticon-milk"></i><span>Plant Milks (45)</span></a></li>
                                    <li><a href="#"><i class="flaticon-cereal"></i><span>cereal (23)</span></a></li>-->
                                 </ul>
                              </div>
                           </li>
						   <li class="navbar-item active"><a class="navbar-link" href="wishlist">Wishlist</a></li>
						   
                           <li class="navbar-item active"><a class="navbar-link" href="#">Blog</a></li>
						   
						   <li class="navbar-item active"><a class="navbar-link" href="account">Account</a></li>
                         
                   
                           <li class="navbar-item"><a class="navbar-link" href="#">Contact</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </nav>