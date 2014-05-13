<?php

include "api.php";
$all_item=array();
$all_item[0] = json_decode(file_get_contents(API."/item/12"));
$all_item[1] = json_decode(file_get_contents(API."/item/7"));
$all_item[2] = json_decode(file_get_contents(API."/item/2"));
$all_item[3] = json_decode(file_get_contents(API."/item/14"));
echo json_encode(convert_all($all_item));

?>
