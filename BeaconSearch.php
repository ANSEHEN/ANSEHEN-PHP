<html>

<head>

<meta http-equiv="content-type" content="text/html; charset= utf-8"/>

<title> Beacon client</title>

</head>

<body>

<?php

echo "certain!@11<br>";



$service_port = '9003';

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

//보낸 beaconTemp와 primaryKey받는 코드가 필요함
$BeaconId = $_POST['beaconTemp'];
$primaryKey = $_POST['uniqueKey'];

$data_send = $BeaconId." ".$primaryKey."\0";

echo $data_send."<br>";

socket_write($socket,$data_send,strlen($data_send)+1);


print '-----------------------------------.<br>';

 

print 'Reading response:<br><br>';
 

print 'Closing socket...';

mysqli_close($connect);

socket_close($socket);

print 'OK.<br><br>';

?>

</body>

</html>
