<?php

$con=mysqli_connect("localhost","root","bitiotansehen","ansehen");
if(!$con)){
	echo "Failed to connect to MySQL";
	exit;
}

mysqli_set_charset($con,"utf8");

$sql="select * from USER_INFO";

$result=mysqli_query($con,$sql);
$data=array();
if($result){
	while($row=mysqli_fetch_array($result)){
		array_push($data,array('unique_key'=>$row[0],'name'=>$row[1],'phone_num'=>$row[2],'phone_num_input'=>$row[3],'pw'=>$row[4],'image_add'=>$row[5],'result'=>$row[6]));
	}
	echo "<pre>"; print_r($data); echo '</pre>';
}
else{
	echo "SQL문 처리중 에러 발생";
	echo mysqli_error($con);
	exit;
}
mysqli_close($con);
?>
