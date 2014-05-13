<?php
	define('API', 'http://admin4/ws/rest');
	//define('USERDATA', sys_get_temp_dir() . '/shopituser.txt');


	//function user(){
	//	if(is_readable(USERDATA)){
	//		$data = file_get_contents(USERDATA);
	//		if($data)
	//			return json_decode($data,TRUE);
	//		else
	//			return false;
	//	}
	//}
	
	//function user_json(){
	//	if(is_readable(USERDATA)){
	//		$data = file_get_contents(USERDATA);
	//		if($data)
	//			return $data;
	//		else
	//			return false;
	//	}
	//}
	
	function convert_all($old){
		$new=array();
		for($i=0;$i<count($old);$i++){
			$new[$i]=convert($old[$i]);
		}	
		return $new;
	}
	
	function convert($old){			
		$img=$old->image;
		if($img==null||$img==""){
			$img="img/noimage.jpg";
		}else{
			$img="data:image/png/jpg/gif;base64,".$img;
		}		
		$flag=1;	
		$new_price=$old->promo*$old->price/100;
		if($new_price==0){	
			$flag=0;
			$new_price=$old->price;
		}if($new_price==$old->price){
			$flag=0;
		}
		$new=array("id"=>$old->itemId,"img"=>$img,"name"=>$old->itemname,"desc"=>$old->description,"price"=>$old->price,"priceNew"=>$new_price,"promo"=>$flag);	
	
		return $new;
	}
	
	function post($url,$param){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;	
	}
	
	function post_raw($url,$param){	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param );		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
		$result=curl_exec ($ch);		
		curl_close($ch);
		return $result;	
	}
?>