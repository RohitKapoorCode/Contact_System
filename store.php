


<?php
if(isset($_POST['submit'])){
    $fullName = $_POST['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $save =$_POST['ContactSave'];


 $conn = mysqli_connect("mysql-4acf231-rk7612570-43fe.g.aivencloud.com", "avnadmin", getenv('DB_PASSWORD'), "defaultdb", 27958) or die("Connection Failed");

    $Sql = "INSERT INTO contact(FullName,Phone,Email,Save) VALUES ('{$fullName}', '{$phone}', '{$email}','{$save}')";
    $result = mysqli_query($conn,$Sql);
    mysqli_close($conn);

    echo "<script>window.location.href='home.php';</script>";
    exit;
}


?>
    

