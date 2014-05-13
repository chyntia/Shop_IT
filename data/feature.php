<?php

include "api.php";
//$all_item=array();
//for($i=1;$i<=16;$i++){
//	$all_item[$i-1]=json_decode(file_get_contents(API."/item/".$i));
//}
$all_item = json_decode(file_get_contents(API."/item"));
echo json_encode(convert_all($all_item));

?>
