
<?php

$fullName = $_POST['first_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$save =$_POST['ContactSave'];


 $conn = mysqli_connect("localhost","root","","contact_project") or die("Connection Falied ");

    $Sql = "INSERT INTO contact(FullName,Phone,Email,Save) VALUES ('{$fullName}', '{$phone}', '{$email}','{$save}')";
    $result = mysqli_query($conn,$Sql);


header("Location: http://localhost/Project/Contact%20Project/index.php");
exit;
mysqli_close($conn);

?>
    