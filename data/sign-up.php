<?php

include "api.php";
$param = json_encode(array("fname"=>$_POST["fname"],"lname"=>$_POST["lname"],"email"=>$_POST["email"],"pass"=>$_POST["pass"]));
$result=post_raw(API."/user",$param);
if(!isset($_SESSION)){
    session_start();
}
if($result==""){
	$_SESSION['signedin']=false;
}else{
	//sign-in
	$param = array("email"=>$_POST["email"],"pass"=>$_POST["pass"]);
	$result=post(API."/login",$param);
	$test=json_decode($result);
	session_start();
	if($test==null){
		$_SESSION['signedin']=false;
	}else{
		$_SESSION['signedin']=true;
		$_SESSION['email']=$test->email;
		$_SESSION['fname']=$test->fname;
		$_SESSION['lname']=$test->lname;
		$_SESSION['userId']=$test->userId;
		$_SESSION['privLevel']=$test->privLevel;
	}
}
echo $_SESSION['signedin'];
?>
