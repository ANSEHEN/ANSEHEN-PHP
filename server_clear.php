<html>
<head>
<title>PHP_TEST</title>
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

$qry1 = "delete from USER_INFO WHERE unique_key='$unique_key'";
echo $qry1;
echo "<br>";
$result1 = mysqli_query($connect, $qry1);
if(!$result1) {
	echo "aaaaaaa<br>";
	echo mysqli_errno($connect) . ": " . mysqli_error($connect) . PHP_EOL;
	echo "<br>";
}

$response = array();
$response["success"] = true;

echo json_encode($response);
?>
</body>
</html>
