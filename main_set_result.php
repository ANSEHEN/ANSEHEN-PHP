<html>
<head>
<title>main_set_result</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "bitiotansehen", "ansehen");

if (!$connect) {
    echo "Error: Unable to connect to MySQL.<br>" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    echo "<br>";
    exit;
}

echo "Success: A proper connection to MySQL was made!<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($connect) . PHP_EOL;
echo "<br>";
mysqli_query($connect, "set names utf8");

$unique_key = $_POST['uniqueKey'];
$result_value = $_POST['result'];
$cctv_id=$_POST['CCTVID'];
$qry1="update USER_INFO set result = '$result_value' where unique_key = '$unique_key'";
$result1 = mysqli_query($connect, $qry1);
if(!$result1) {
	echo mysqli_errno($connect) . ": " . mysqli_error($connect) . PHP_EOL;
}
$qry2="update USER_INFO set used_cctv_id = '$cctv_id' where unique_key = '$unique_key'";
$result2 = mysqli_query($connect, $qry2);
if(!$result2) {
	echo mysqli_errno($connect) . ": " . mysqli_error($connect) . PHP_EOL;
}


?>
</body>
</html>
