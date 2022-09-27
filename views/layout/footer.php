<?php $helper=new Helper();  $sharingID=$helper->encrypt_decrypt($_SESSION['user_id']);?>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color:white;
  text-align: center;
}

.invitebutton {
  position: fixed;
  
}
</style>
<div class="container-fluid">
<div class="footer">
<button style="background-color:#007da1;height:30px;width:100%" type="button" class="btn btn-primary" onClick="shareURL('<?=$sharingID?>')" style="margin-bottom:3px;">Invite</button></p>
</div>
</div>