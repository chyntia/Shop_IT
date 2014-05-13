<?php
include "api.php";

if(!isset($_SESSION)){
    session_start();
}
$name="";
if(isset($_SESSION['signedin'])){
	$id=$_SESSION['userId'];
}

$data = json_decode(file_get_contents(API."/transaction/".$_SESSION['userId']));
//print_r($data);	

$transaction=array();
for($i=0;$i<count($data);$i++){
	$transaction[$i]=array("date"=>(date("j F Y")),"total"=>($data[$i]->total),"id"=>($data[$i]->transactionId));
}

echo json_encode(array_reverse($transaction));
?>
