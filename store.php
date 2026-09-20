<?php

ob_start(); 

if(isset($_POST['submit'])){
    $fullName = $_POST['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $save = $_POST['ContactSave'];


    $conn = mysqli_connect("://aivencloud.com", "avnadmin", getenv('DB_PASSWORD'), "defaultdb", 27958) or die("Connection Failed");

 
    $sql = "INSERT INTO contact(FullName, Phone, Email, Save) VALUES ('{$fullName}', '{$phone}', '{$email}', '{$save}')";
    $result = mysqli_query($conn, $sql);


    mysqli_close($conn);

  
    echo "<script>window.location.href='http://localhost/Rohit%20Project/contact%20Project/home.php';</script>";
    exit();
}


?>
