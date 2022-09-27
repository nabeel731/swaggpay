<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}
.
.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}
.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}
.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
hr {
  margin: auto;
  width: 40%;
}
</style>
<body>
<?php if(!empty($settings['about'])){?>
<img src="<?=$settings['about']?>" style="width:100%;height:100%">
     <?php }?>
<div class="bgim">
  <div class="middle">
    <?php if(empty($settings['about'])){?>
        <h1 class="center">No Data Available This Time</h1>
     <?php }?>
    
  </div>
  
</div>
</body>
</html>