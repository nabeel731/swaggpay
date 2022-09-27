<!DOCTYPE html>
<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
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
  top:50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.middles {
  position: absolute;
  top:35%;
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
<?php if($totaluser[0]['totaluser']>14){?>
<div class="bgim">
  <div class="middles">
   
        <h1 class="center">Your Salary</h1>
        <h1 class="center">Rs:<?=$totaluser[0]['totaluser']*730?></h1>
        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#salaerymodal">Get Your Salary</button>
		 <h1 class="center">Note</h1>
		 <p class="center" style="font-size:25px;">Your Salary Has Been Started From 1 May.This Salary Give You Every Month.If You To Want Increase Salary Then Join More Member.per Member 730 Will be Add In Your Salary After Join 1 Member In Your Team</p>
     <h1 class="center">Member After 1 April:<?=$totaluser[0]['totaluser']?></h1>
  </div>
  
</div>
<?php  }?>

<?php if($totaluser[0]['totaluser']<15){?>
<div class="bgim">
  <div class="middle">
   
        <h1 class="center">Monthly Salaray Has Been Started</h1>
		 <p class="center" style="font-size:25px;">But Your Are Not Eligible,BeCause You Have Not Complete Your Target.Add 15 Member In Your Team From April</p>
		 <h1 class="center">Note</h1>
		 <p class="center" style="font-size:25px;">Add 15 Member In Your Team After 1 April.Then Your Salary will be 11000.If You Join More People Then Your Salary will be Increase </p>
     <h1 class="center">Member After 1 April:<?=$totaluser[0]['totaluser']?></h1>
  </div>
  
</div>
<?php  }?>

</body>
</html>

<div class="modal fade" id="salaerymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your Salary Has Been Started from 1 May.But You Will be Get After End Of May.Salary Schedual Is 1-5 Date Of Every Month.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>