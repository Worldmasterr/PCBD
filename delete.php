<?php
$servername = "monorail.proxy.rlwy.net";
$username = "root";
$password = "qylvMiklHKdPNvVHRfDpaveQoXZWIfvM";
$dbname = "railway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$CPF = $_GET['CPF'];

$sql = "DELETE FROM funcionario WHERE CPF=$CPF";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
