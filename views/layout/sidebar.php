<?php $helper=new Helper();  $sharingID=$helper->encrypt_decrypt($user['id']);?>
<aside>
<div class="sidebar-box">
<div class="user">
<figure>
<a href="#"><img src="<?=$user['profile']?>" style="width:90px;height:120px;" alt=""></a>
</figure>
<div class="usercontent">
<p><?=$_SESSION['user_name']?></p>
<p>Level:<?=$user['level_id']?></p>
</div>
</div>
<nav class="navdashboard">
<ul>

<li>
<a href="products">
<i class="lni-list" aria-hidden="true"></i>
<span>Products</span>
</a>
</li>
<li>
<a class="active" href="profile">
<i class="lni-cog"></i>
<span>Profile</span>
</a>
</li>
<?php include_once 'shareModal.php'?>
<li>
 <a href="#" onClick="shareURL('<?=$sharingID?>')">
<i class="lni-heart"></i>
<span>InVite</span>
</a>
</li>
<li>
 <a href="team">
<i class="lni-user"></i>
<span>Team</span>
</a>
</li>

<li>
 <a href="wallet">
<i class="lni-wallet"></i>
<span>Wallet</span>
</a>
</li>
<li>
<a href="https://api.whatsapp.com/send?phone=+923424977340&text=&source=&data=" class="whatsApp" target="_blank"><i class="fa fa-whatsapp fa_custom fa-5x"></i><span>Contact us</span></a>
</li>
<li>
<a href="logout">
<i class="lni-enter"></i>
<span>Logout</span>
</a>
</li>
</ul>
</nav>
</div>
</aside>