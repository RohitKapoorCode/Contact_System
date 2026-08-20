<?php

$conn = mysqli_connect("localhost", "root", "", "contact_project")  or die("Connection Failed");

if (isset($_POST['update'])) {
    $id = $_POST['Id'];
    $fullName = $_POST['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE contact SET
            FullName = '{$fullName}',
            Phone = '{$phone}',
            Email = '{$email}'
            WHERE Id = {$id}";

    mysqli_query($conn, $sql)
        or die("Query Unsuccessful: " . mysqli_error($conn));

    mysqli_close($conn);

    header("Location: index.php");
    exit;
}


// ===============================
// FETCH OLD DATA
// ===============================

if (!isset($_GET['Id'])) {die("ID not found");
}

$id = $_GET['Id'];

$sql = "SELECT * FROM contact WHERE Id = {$id}";

$result = mysqli_query($conn, $sql)
    or die("Query Unsuccessful: " . mysqli_error($conn));

if (mysqli_num_rows($result) == 0) {
    die("Record not found");
}

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UPDATE CONTACT </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">

</head>

<body>

<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.php"> <strong>Contact</strong> App</a>
    </div>
</nav>


<!-- content -->

<main class="py-5">

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Update Details</strong>
                     </div>
                    <div class="card-body">
                        <form action="update.php" method="POST">
                            <!-- ID hidden rahegi -->
                            <input type="hidden" name="Id"   value="<?php echo $row['Id']; ?>">
                            <!-- Full Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="first_name"class="form-control"value="<?php echo $row['FullName']; ?>"required>
                                </div>
                            </div>
                            <!-- Phone -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone"   class="form-control"   value="<?php echo $row['Phone']; ?>">
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Email</label>

                                <div class="col-md-9">
                                    <input type="email"name="email"class="form-control"value="<?php echo $row['Email']; ?>">
                                </div>
                                </div>
                                                    <!-- Save -->
                        <div class="form-group row">

                            <label for="ContactSave" class="col-md-3 col-form-label">Save </label>
                            <div class="col-md-9">
                                <select name="ContactSave"  id="ContactSave"   class="form-control"required>
                                    <?php
                                    $saveSql = "SELECT * FROM save";
                                    $saveResult = mysqli_query($conn, $saveSql)
                                        or die("Save Query Unsuccessful");

                                    while ($saveRow = mysqli_fetch_assoc($saveResult)) {

                                        $selected = ($row['save'] == $saveRow['id']) ? "selected" : "";

                                    ?>

                                        <option value="<?php echo $saveRow['id']; ?>"
                                                <?php echo $selected; ?>>

                                            <?php echo $saveRow['Device']; ?>

                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                            <hr>


                            <!-- Buttons -->

                            <div class="form-group row mb-0">

                                <div class="col-md-9 offset-md-3">

                                    <button type="submit" name="update" class="btn btn-primary">  Update</button>
                                    <a href="index.php"class="btn btn-outline-secondary">
                                        Cancel </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php
mysqli_close($conn);

?>