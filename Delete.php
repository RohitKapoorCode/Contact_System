<?php



$conn = mysqli_connect("mysql-4acf231-rk7612570-43fe.g.aivencloud.com", "avnadmin", getenv('DB_PASSWORD'), "defaultdb", 27958) or die("Connection Failed");

$po = $_GET['Id'];

$sql = "DELETE FROM contact WHERE Id = {$po}";

$result = mysqli_query($conn, $sql)
    or die("Query Unsuccessful: " . mysqli_error($conn));

header("Location: index.php");
exit;
mysqli_Close($conn);

?>
