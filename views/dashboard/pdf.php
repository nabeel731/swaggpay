<?php 
include_once'vendor/autoload.php';

foreach($users as $user )
{
	
	$username=$user['name'];
	$phone=$user['phone'];
	$address=$user['address'];
	$city=$user['city'];
$to="<h1>To,</h1>";
$Name="<h3>Name:$username</h3>";
$Phone="<h3>Phone:$phone</h3>";
$Address="<h3>Address:$address</h3>";
$District="<h3>District:$city</h3>";
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($to);
$mpdf->WriteHTML($Name);
$mpdf->WriteHTML($Phone);
$mpdf->WriteHTML($Address);
$mpdf->WriteHTML($District);
$mpdf->Output();

}


//$mpdf->Output();
