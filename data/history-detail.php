<?php	
include "api.php";

if(!isset($_SESSION)){
    session_start();
}
$name="";
if(isset($_SESSION['signedin'])){
	$id=$_SESSION['userId'];
}

$data = json_decode(file_get_contents(API."/transaction/".$_SESSION['userId']."/".$_POST["id"]));
$data=$data->itemdata;

$total=0;
$item=array();
for($i=0;$i<count($data);$i++){
	$subtotal=$data[$i]->price*$data[$i]->quantity;
	$total=$total+$subtotal;
	$item[$i]=array("id"=>$data[$i]->id,"name"=>$data[$i]->name,"price"=>$data[$i]->price,"quantity"=>$data[$i]->quantity,"subtotal"=>$subtotal);
}
$history_detail=array("item"=>$item,"total"=>$total);
echo json_encode($history_detail);
?>
