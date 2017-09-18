<html>

<head>

<meta http-equiv="content-type" content="text/html; charset= utf-8"/>

<title>Change State</title>

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
$state = $_POST['state'];
$primaryKey = $_POST['uniqueKey'];

$data_send = "$state"."\0";
socket_write($socket,$data_send,strlen($data_send));
$data_read=socket_read($socket,10);
$data_send="$primaryKey"."\0";
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
if(strcmp($state,"state")==0){
	$SQL00="update USER_INFO set result=0 where unique_key='$primaryKey'";
	mysqli_query($connect,$SQL00);
	$result = mysqli_query($connect,"SELECT * FROM USER_INFO where unique_key = '$primaryKey'");
	$info=mysqli_fetch_array($result);
	$data_send = $info['used_cctv_id']."\0";
	echo $data_send."<br>";
	socket_write($socket,$data_send,strlen($data_send));
	$data_read=socket_read($socket,10);
}
mysqli_close($connect);
socket_close($socket);
?>

</body>

</html>
