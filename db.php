<?php
$servername = "localhost";
$username = "jiahua_name";
$password = "jiahua_password";
$dbname = "seek";

$conn = new mysqli($servername, $username, $password, $dbname); 
// 检测连接 
if (!$conn)
{ 
    die("Connection failed: " . $conn->connect_error); 
}
?>