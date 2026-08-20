<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CONTACT APP</title>

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

        <div class="row">
          <div class="col-md-12">

            <div class="card">

              <div class="card-header card-title">
                <div class="d-flex align-items-center">

                  <h2 class="mb-0">All Contacts</h2>

                  <div class="ml-auto">
                    <a href="form.php" class="btn btn-success">
                      <i class="fa fa-plus-circle"></i>
                      Add Contact Number
                    </a>
                  </div>

                </div>
              </div>
               <?php
                $conn=mysqli_connect("localhost","root","","contact_project") or die("Connection Falied ");

                $Sql ="SELECT * FROM contact JOIN  save   WHERE contact.save = save.id ORDER BY contact.Id ASC";
                $result = mysqli_query($conn,$Sql)or die("Query Unsucessful");

                if(mysqli_num_rows($result) > 0){
               
               ?>
              <div class="card-body">
              <div class="table-responsive">

                <table class="table table-striped table-hover">

                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Save</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>


                  <tbody>
                      <?php
                        while($row = mysqli_fetch_assoc($result)){
                      ?>
                    <tr>
                      <td><?php echo $row['Id'];  ?></td>
                      <td><?php echo $row['FullName']; ?></td>
                      <td><?php echo $row['Phone']; ?></td>
                      <td><?php echo $row['Email'];?></td>
                      <td><?php echo $row['Device']; ?></td>

                      <td width="150">

                        <a href="update.php?Id=<?php echo $row['Id']; ?>"
                          class="btn btn-sm btn-circle btn-outline-secondary"
                          title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="Delete.php?Id=<?php echo $row['Id']; ?>" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"  onclick="confirm('Are you sure?')">
                          <i class="fa fa-times"></i>
                        </a>

                      </td>

                    </tr>
                  <?php }?>
                  </tbody>

                </table>
              <?php } else{
                echo "<h2 ><b><i><center>No Record Found</center></i></b></h2>";
              }
               mysqli_Close($conn);
               ?> 
              
              </div>
            </div>
          </div>
          </div>
        </div>

      </div>
    </main>

  </body>
</html>