<html>

<head>

<meta http-equiv="content-type" content="text/html; charset= utf-8"/>

<title> CCTV Location</title>

</head>

<body>

<?php

echo "certain!@11<br>";



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
$primaryKey = $_POST['uniqueKey'];
$EndPoint=$_POST['endPoint'];
$AllPath = $_POST['allPath'];

$data_send = "info"."\0";
socket_write($socket,$data_send,strlen($data_send));
$data_read=socket_read($socket,10);
/////////////////////
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
unique_key = '$primaryKey'");
$info=mysqli_fetch_array($result);
$data_send = $info['phone_num']." ".$info['phone_num_input']." ".$info['name']." ".$info['pw']." ".$info['image_add']." ".$info['unique_key']."\0";
	echo $data_send."<br>";
	socket_write($socket,$data_send,strlen($data_send));
	$data_read=socket_read($socket,10);

/////////////////////
$strTok=explode('##',$AllPath);
$cnt=count($strTok);

$data_send = $primaryKey."\0";
socket_write($socket,$data_send,strlen($data_send));
$data_read=socket_read($socket,10);

$data_send = $EndPoint."\0";
socket_write($socket,$data_send,strlen($data_send));
$data_read=socket_read($socket,10);

for($i=0; $i<$cnt;$i++){
	$data_send = $strTok[$i]."\0";
	socket_write($socket,$data_send,strlen($data_send));
	$data_read=socket_read($socket,10);
}
$data_send = "one"."\0";
socket_write($socket,$data_send,strlen($data_send));

print '-----------------------------------.<br>';

 

print 'Reading response:<br><br>';
 

print 'Closing socket...';

mysqli_close($connect);

socket_close($socket);

print 'OK.<br><br>';

?>

</body>

</html>
