<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>NEW CONTACT</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
  </head>

  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand text-uppercase" href="index.php">
            <strong>Contact</strong> App
        </a>
      </div>
    </nav>

    <!-- content -->
    <main class="py-5">
      <div class="container">

        <div class="row justify-content-md-center">
          <div class="col-md-8">

            <div class="card">

              <div class="card-header card-title">
                <strong>New Contact</strong>
              </div>

              <div class="card-body">

                <!-- FORM START -->
                <form action="store.php" method="POST">

                  <div class="row">

                    <div class="col-md-12">

                      <div class="form-group row">
                        <label for="first_name" class="col-md-3 col-form-label">Full Name </label>

                        <div class="col-md-9">
                          <input type="text"  name="first_name" class="form-control"required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-md-3 col-form-label">Phone </label>

                        <div class="col-md-9">
                          <input type="tel" name="phone" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label name="email" class="col-md-3 col-form-label" type="text" >Email </label>

                        <div class="col-md-9">
                          <input type="text" name="email" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="ContactSave" class="col-md-3 col-form-label">Save</label>

                        <div class="col-md-9">
                          <select name="ContactSave"  id="ContactSave" class="form-control">
                            <option value = ""  selected disabled >Select Class </option>
                            <?php
                                $conn=mysqli_connect("localhost","root","","contact_project") or die("Connection Falied ");

                                $Sql ="SELECT * FROM save ";
                                $result = mysqli_query($conn,$Sql)or die("Query Unsucessful");

                                while($row=mysqli_fetch_assoc($result)){
                              
                              
                              ?>
                              <option value = "<?php echo $row['id']; ?>" ><?php  echo $row['Device']; ?> </option>
                            <?php }
                            mysqli_close($conn)
                            ?>
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                          <button type="submit" class="btn btn-primary">Save</button>
                          <a href=""
                             class="btn btn-outline-secondary">Cancel </a>
                          <a href="index.php"
                             class="btn btn-outline-secondary">Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- FORM END -->

              </div>
            </div>

          </div>
        </div>

      </div>
    </main>

  </body>
</html>