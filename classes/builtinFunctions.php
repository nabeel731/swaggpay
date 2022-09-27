<?php

function loadView($view,$data=null){
	require 'views/'.$view.".php"; die;
}

function redirect($path){
	echo "<script>location.href='".$path."'</script>"; die;
}

function safePrint($str){
	echo htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}


function csrf(){
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
    echo '<input type="hidden" value="'.$_SESSION['csrf'].'" name="csrf"></input>';
}