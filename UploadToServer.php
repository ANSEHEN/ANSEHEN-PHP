<html>
 <head>
  <title> php_upload</title>
</head>
<body>
<?php
  
$file_path = "./image/";
$uploadfile = $file_path . basename( $_FILES['uploaded_file']['name']);
$test_send = basename( $_FILES['uploaded_file']['name']);
$i=0;
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadfile)) {

	echo "success";
	$i=1;

} 
else
{
	echo "fail<br>";
}

/*if($i==1)
{

$service_port = '9005';
$address ='121.138.83.53';
print 'socket_create!! '; 
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket == false) {
    print 'socket_create() failed: reason: ' .socket_strerror(socket_last_error()) . '\n';
} else {
    print 'OK.<br>';
}
print 'socket_connect!! ';
$result = socket_connect($socket, $address , $service_port);
if ($result == false) {
    print 'socket_connect() failed.\nReason: ($result) ' .socket_strerror(socket_last_error($socket)) . '\n';
} else {
    print 'OK.<br>';
}
echo "-------------------------------<br>";
$connect = mysqli_connect("localhost", "root", "bitiotansehen", "ansehen");
if(!$connect){
	print ' Error: connect<br>';
	exit;
} else {
	print 'connect DB<br>';
}
$dbname="ansehen";
mysqli_select_db($connect,$dbname);
print 'db selected<br>';

$result = mysqli_query($connect,"SELECT * FROM USER_INFO where 
image_add = '$test_send'");
$info=mysqli_fetch_array($result);
$data_send = $info['phone_num']." ".$info['phone_num_input']." ".$info['name']." ".$info['pw']." ".$info['image_add']." ".$info['unique_key']."\0";
	echo $data_send."<br>";
	socket_write($socket,$data_send,strlen($data_send));
mysqli_close($connect);
socket_close($socket);


}
*/




 ?>
</body>
</html>
