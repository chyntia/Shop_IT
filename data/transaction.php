<?php
include "cart.php";

//include 'ExpeditionWSService.php';
//$es = new ExpeditionWSService();
//$t = $es->getToken("1234567890");
$receiver="name";
if(!isset($_SESSION)){
    session_start();	
}
$receiver=$_SESSION['email'];
$param_expedition=array("Shop IT!", "Bandung", $receiver, $_POST['address'], "elektronik", "1");
//$res=$es->sendItem($t, $param_expedition);
$res=2;
$param=$_POST['text']."".$res."".$_POST['text2'];
print_r($param);
$result=post_raw(API."/transaction",$param);
if(!isset($_SESSION)){
    session_start();	
}
file_put_contents(CARTDATA, "");
echo $result;
//if(!isset($_SESSION)){
//    session_start();
//}
//$result=explode("\n",$result);
//$result=explode("=>",$result[2]);
//$result=$result[1];
//if(intval($result)==intval($_SESSION['userId'])){
//		file_put_contents(CARTDATA, "");
//	echo "1";
//}
?>
