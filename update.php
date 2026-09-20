<?php


$conn = mysqli_connect("mysql-4acf231-rk7612570-43fe.g.aivencloud.com", "avnadmin", getenv('DB_PASSWORD'), "defaultdb", 27958) or die("Connection Failed");


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

    header("Location: home.php");
    exit;
}


// ===============================
// FETCH OLD DATA
// ===============================

if (!isset($_GET['Id'])) {
    die("ID not found");
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UPDATE CONTACT</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

    <!-- Standalone Engine for Offline & Online CSS Framework Compatibility -->
    <style>
      * { box-sizing: border-box; margin: 0; padding: 0; }
      body { font-family: 'Varela Round', sans-serif; background-color: #f8fafc; color: #334155; -webkit-font-smoothing: antialiased; }
      
      /* Navbar Layout matching index file */
      nav { background-color: #ffffff; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border-bottom: 1px solid #e2e8f0; }
      .nav-container { max-width: 1100px; margin: 0 auto; padding: 16px; }
      .nav-brand { text-decoration: none; font-size: 1.125rem; tracking-spacing: 0.05em; color: #0f172a; font-weight: bold; }
      .brand-highlight { color: #4f46e5; text-transform: uppercase; font-weight: 800; }
      
      /* Container and Main Content split grids */
      main { padding: 48px 0; }
      .container { max-width: 800px; margin: 0 auto; padding: 0 16px; }
      
      /* Custom Form Layout Panel Block */
      .card { background-color: #ffffff; border-radius: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; overflow: hidden; }
      .card-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; background-color: rgba(248, 250, 252, 0.6); }
      .card-header strong { font-size: 1.15rem; font-weight: 700; color: #0f172a; }
      
      .card-body { padding: 32px 24px; }
      
      /* Flexible form grouping framework classes */
      .form-group-row { display: flex; flex-direction: column; margin-bottom: 24px; gap: 8px; }
      @media (min-width: 768px) {
        .form-group-row { flex-direction: row; align-items: center; gap: 16px; }
      }
      
      .form-label { font-size: 0.875rem; font-weight: 600; color: #475569; min-width: 140px; }
      .input-wrapper { flex-grow: 1; }
      
      /* Modern inputs validation styling focus states */
      .form-control { width: 100%; padding: 10px 14px; background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 0.875rem; color: #0f172a; outline: none; transition: all 0.2s ease-in-out; }
      .form-control:focus { border-color: #4f46e5; background-color: #ffffff; box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12); }
      
      select.form-control { appearance: none; background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://w3.org' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; background-size: 16px; padding-right: 40px; cursor: pointer; }
      
      hr { border: 0; border-top: 1px solid #f1f5f9; margin: 24px 0; }
      
      /* Interactive Action items block */
      .action-buttons { display: flex; flex-wrap: wrap; gap: 10px; }
      @media (min-width: 768px) {
        .action-buttons { padding-left: 140px; gap: 12px; }
      }
      
      /* Global elements custom components styling framework */
      .btn { display: inline-flex; align-items: center; justify-content: center; padding: 10px 20px; font-size: 0.875rem; font-weight: 600; border-radius: 12px; text-decoration: none; cursor: pointer; transition: all 0.15s ease-in-out; border: 1px solid transparent; }
      .btn-primary { background-color: #4f46e5; color: #ffffff; box-shadow: 0 1px 2px rgba(0,0,0,0.05); border: none; }
      .btn-primary:hover { background-color: #4338ca; }
      
      .btn-outline-secondary { background-color: #ffffff; border-color: #e2e8f0; color: #64748b; }
      .btn-outline-secondary:hover { background-color: #f8fafc; color: #334155; border-color: #cbd5e1; }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav>
      <div class="nav-container">
        <a class="nav-brand" href="index.php">
            <span class="brand-highlight">Contact</span> App
        </a>
      </div>
    </nav>

    <!-- content -->
    <main>
      <div class="container">

        <div class="card">  
          <div class="card-header">
            <strong>Update Details</strong>
          </div>

          <div class="card-body">
            <!-- FORM START -->
            <form action="update.php" method="POST">
                
              <!-- ID hidden rahegi -->
              <input type="hidden" name="Id" value="<?php echo $row['Id']; ?>">

              <!-- Full Name Field -->
              <div class="form-group-row">
                <label class="form-label">Full Name</label>
                <div class="input-wrapper">
                  <input type="text" name="first_name" class="form-control" value="<?php echo $row['FullName']; ?>" required>
                </div>
              </div>

              <!-- Phone Field -->
              <div class="form-group-row">
                <label class="form-label">Phone</label>
                <div class="input-wrapper">
                  <input type="text" name="phone" class="form-control" value="<?php echo $row['Phone']; ?>">
                </div>
              </div>

              <!-- Email Field -->
              <div class="form-group-row">
                <label class="form-label">Email</label>
                <div class="input-wrapper">
                  <input type="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>">
                </div>
              </div>

              <!-- Save Target Select Field -->
              <div class="form-group-row">
                <label for="ContactSave" class="form-label">Save To</label>
                <div class="input-wrapper">
                  <select name="ContactSave" id="ContactSave" class="form-control" required>
                    <?php
                    $saveSql = "SELECT * FROM save";
                    $saveResult = mysqli_query($conn, $saveSql) or die("Save Query Unsuccessful");

                    while ($saveRow = mysqli_fetch_assoc($saveResult)) {
                        $selected = ($row['save'] == $saveRow['id']) ? "selected" : "";
                    ?>
                        <option value="<?php echo $saveRow['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $saveRow['Device']; ?>
                        </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <hr>

              <!-- Action Control Panel -->
              <div class="action-buttons">
                <button type="submit" name="update" class="btn btn-primary">Update Details</button>
                <a href="home.php" class="btn btn-outline-secondary">Cancel</a>
              </div>

            </form>
            <!-- FORM END -->
          </div>
        </div>

      </div>
    </main>

</body>
</html>
<?php
mysqli_close($conn);
?>
