<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CONTACT APP</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://googleapis.com">

    <!-- Standalone Compiled Production CSS Engine (0ms Loading Time - Offline Compatible) -->
    <style>
      * { box-sizing: border-box; margin: 0; padding: 0; }
      body { font-family: 'Varela Round', sans-serif; background-color: #f8fafc; color: #334155; -webkit-font-smoothing: antialiased; }
      
      /* Header & Navbar */
      nav { background-color: #ffffff; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border-bottom: 1px solid #e2e8f0; }
      .nav-container { max-width: 1100px; margin: 0 auto; padding: 16px; }
      .nav-brand { text-decoration: none; font-size: 1.125rem; color: #0f172a; font-weight: bold; tracking-spacing: 0.05em; }
      .brand-highlight { color: #4f46e5; text-transform: uppercase; font-weight: 800; }
      
      /* Main Content Grid */
      main { padding: 48px 0; }
      .container { max-width: 1100px; margin: 0 auto; padding: 0 16px; }
      
      /* Panels & Cards */
      .card { background-color: #ffffff; border-radius: 16px; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; overflow: hidden; }
      .card-header { padding: 20px 24px; background-color: rgba(248, 250, 252, 0.5); display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; flex-wrap: wrap; gap: 16px; }
      .card-header h2 { font-size: 1.25rem; font-weight: 700; color: #0f172a; }
      
      /* Add Contact Button */
      .btn-success { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; background-color: #059669; color: #ffffff; font-weight: 600; border-radius: 12px; text-decoration: none; font-size: 0.85rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: background-color 0.15s; }
      .btn-success:hover { background-color: #047857; }
      
      /* Table Framework */
      .card-body { padding: 24px; }
      .table-responsive { overflow-x: auto; border-radius: 12px; border: 1px solid #e2e8f0; }
      
      table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; }
      thead tr { background-color: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #94a3b8; font-size: 11px; text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em; }
      th, td { padding: 14px 24px; vertical-align: middle; }
      tbody tr { border-bottom: 1px solid #f1f5f9; transition: background-color 0.15s; }
      tbody tr:hover { background-color: rgba(248, 250, 252, 0.8); }
      
      /* Table Columns Custom Decorators */
      .col-id { font-family: monospace; color: #94a3b8; font-weight: 500; }
      .col-name { font-weight: 600; color: #0f172a; }
      .col-phone { color: #475569; }
      .col-email { color: #64748b; }
      
      /* Badges */
      .badge { display: inline-flex; padding: 2px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: #e0e7ff; color: #4338ca; border: 1px solid #c7d2fe; }
      
      /* Action Buttons with SVG Paths built-in (No FontAwesome dependency needed) */
      .actions-wrapper { display: flex; justify-content: center; gap: 10px; }
      .btn-action { height: 36px; width: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; border: 1px solid #e2e8f0; background: #ffffff; text-decoration: none; transition: all 0.2s ease-in-out; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
      
      .btn-edit { color: #4f46e5; }
      .btn-edit:hover { background-color: #f5f3ff; border-color: #c7d2fe; color: #4338ca; }
      
      .btn-delete { color: #dc2626; }
      .btn-delete:hover { background-color: #fee2e2; border-color: #fecaca; color: #b91c1c; }
      
      .empty-box { padding: 48px; text-align: center; color: #94a3b8; font-style: italic; }
      .svg-icon { width: 16px; height: 16px; fill: currentColor; pointer-events: none; }
    </style>
  </head>

  <body>

    <!-- Navbar -->
    <nav>
      <div class="nav-container">
        <a class="nav-brand" href="index.php">
            <span class="brand-highlight">Contact</span> App
        </a>
      </div>
    </nav>

    <!-- Content -->
    <main>
      <div class="container">

        <!-- Card Layout -->
        <div class="card">

          <!-- Card Header -->
          <div class="card-header">
              <h2>All Contacts</h2>
              <div>
                <a href="form.php" class="btn btn-success">
                  <!-- Inline Inline SVG Icon for Plus -->
                  <svg class="svg-icon" style="fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                  <span>Add Contact Number</span>
                </a>
              </div>
          </div>

           <?php
            
            $conn = mysqli_connect("mysql-4acf231-rk7612570-43fe.g.aivencloud.com", "avnadmin", getenv('DB_PASSWORD'), "defaultdb", 27958) or die("Connection Failed");


            $Sql ="SELECT * FROM contact JOIN save WHERE contact.save = save.id ORDER BY contact.Id ASC";
            $result = mysqli_query($conn,$Sql) or die("Query Unsuccessful");

            if(mysqli_num_rows($result) > 0){
           ?>
           
          <!-- Card Body & Table -->
          <div class="card-body">
            <div class="table-responsive">

              <table>
                <thead>
                  <tr></tr>
                    <?php foreach ($result as $i): ?>
                    <th><?php $i ?></th>
                    <?php endforeach; ?>      
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Save</th>
                    <th style="text-align: center;">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <td class="col-id"><?php echo $row['Id']; ?></td>
                    <td class="col-name"><?php echo $row['FullName']; ?></td>
                    <td class="col-phone"><?php echo $row['Phone']; ?></td>
                    <td class="col-email"><?php echo $row['Email']; ?></td>
                    <td>
                      <span class="badge">
                        <?php echo $row['Device']; ?>
                      </span>
                    </td>

                    <td style="width: 150px;">
                      <div class="actions-wrapper">
                        
                        <!-- Fixed Action Link: Edit with Inline Vector SVG -->
                        <a href="update.php?Id=<?php echo $row['Id']; ?>" class="btn-action btn-edit" title="Edit Contact">
                          <svg class="svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"></path></svg>
                        </a>

                        <!-- Fixed Action Link: Delete with Inline Vector SVG -->
                        <a href="Delete.php?Id=<?php echo $row['Id']; ?>" class="btn-action btn-delete" title="Delete Contact" onclick="return confirm('Are you sure you want to delete this contact?')">
                          <svg class="svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>

                      </div>
                    </td>

                  </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
          </div>
          <?php } else {
            echo "<div class='empty-box'>No Record Found</div>";
          }
           mysqli_close($conn);
           ?> 
          
        </div>

      </div>
    </main>

  </body>
</html>
