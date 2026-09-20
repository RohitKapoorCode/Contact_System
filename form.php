<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>NEW CONTACT</title>

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
      .btn-primary { background-color: #4f46e5; color: #ffffff; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
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
            <strong>New Contact</strong>
          </div>

          <div class="card-body">
            <!-- FORM START -->
            <form action="store.php" method="POST">

              <!-- Full Name Field -->
              <div class="form-group-row">
                <label for="first_name" class="form-label">Full Name</label>
                <div class="input-wrapper">
                  <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="e.g. John Doe">
                </div>
              </div>

              <!-- Phone Field -->
              <div class="form-group-row">
                <label for="phone" class="form-label">Phone</label>
                <div class="input-wrapper">
                  <input type="tel" name="phone" id="phone" class="form-control" placeholder="e.g. +1 (555) 000-0000">
                </div>
              </div>

              <!-- Email Field -->
              <div class="form-group-row">
                <label for="email" class="form-label">Email</label>
                <div class="input-wrapper">
                  <input type="text" name="email" id="email" class="form-control" placeholder="e.g. john@example.com">
                </div>
              </div>

              <!-- Save Target Select Field -->
              <div class="form-group-row">
                <label for="ContactSave" class="form-label">Save To</label>
                <div class="input-wrapper">
                  <select name="ContactSave" id="ContactSave" class="form-control" required>
                    <option value="" selected disabled>Select Device/Location</option>
                    <?php
                        
                        $conn = mysqli_connect("mysql-4acf231-rk7612570-43fe.g.aivencloud.com", "avnadmin", getenv('DB_PASSWORD'), "defaultdb", 27958) or die("Connection Failed");


                        $Sql ="SELECT * FROM save";
                        $result = mysqli_query($conn,$Sql) or die("Query Unsuccessful");

                        while($row=mysqli_fetch_assoc($result)){
                    ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['Device']; ?></option>
                    <?php 
                        }
                        mysqli_close($conn);
                    ?>
                  </select>
                </div>
              </div>

              <hr>

              <!-- Action Control Panel -->
              <div class="action-buttons">
                <button type="submit" class="btn btn-primary" name="submit">Save Contact</button>
                <a href="" class="btn btn-outline-secondary">Reset</a>
                <a href="home.php" class="btn btn-outline-secondary">Back to Directory</a>
              </div>

            </form>
            <!-- FORM END -->
          </div>
        </div>

      </div>
    </main>

  </body>
</html>
