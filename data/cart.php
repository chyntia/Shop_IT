<?php
include "api.php";

if(!isset($_SESSION)){
    session_start();
}
$name="";
if(isset($_SESSION['signedin'])){
	$name=$_SESSION['email'];
}
define('CARTDATA', sys_get_temp_dir() . '/shopit'.$name.'.txt');
$verb = $_SERVER['REQUEST_METHOD'];



switch($verb){
	case 'GET' : select(); break;
	case 'POST' : add(); break;
	case 'PUT' : edit(); break;
	case 'DELETE' : hapus(); break;	
}

function add(){
    $data = read();
    if(isset($_POST['id'])){$data[$_POST['id']] = 1;}
    file_put_contents(CARTDATA, json_encode($data));
}

function select(){
    $data = read();
	$key=array_keys($data);
	$cart=array();
	$all_item=json_decode(file_get_contents(API."/item"));	
	for($i=0;$i<count($key);$i++){	
		if($data[$key[$i]]>0){
			//$cart[$i]=json_decode(file_get_contents(API.'/'.$key[$i]));	
			$x=json_decode(file_get_contents(API.'/item/'.$key[$i]));
			$cart[$i]=convert($x);
			$cart[$i]["quantity"]=$data[$key[$i]];
					
			
		}
	}
	echo json_encode($cart);	   
}

function edit(){
	parse_str(file_get_contents("php://input"),$input);	
    $data = read();
	echo $input['id']."-".$input['quantity'];
    $data[$input['id']] = $input['quantity'];
    file_put_contents(CARTDATA, json_encode($data));
	
	$data = read();
	echo json_encode($data);
}

function read(){
    if(is_readable(CARTDATA)){
        $data = file_get_contents(CARTDATA);
        if($data)
            return json_decode($data,TRUE);
    }
    return array();
}
?>
