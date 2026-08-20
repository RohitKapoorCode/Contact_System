<?php


$conn = mysqli_connect("localhost", "root", "", "contact_project")  or die("Connection Failed");
$po = $_GET['Id'];

$sql = "DELETE FROM contact WHERE Id = {$po}";

$result = mysqli_query($conn, $sql)
    or die("Query Unsuccessful: " . mysqli_error($conn));

header("Location: index.php");
exit;
mysqli_Close($conn);

?>
