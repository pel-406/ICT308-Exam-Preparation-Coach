<?php  require_once '../dbconnect.php'?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add User</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require_once 'sidebar.php' ?>


      <!-- Header -->
      <div class="header">
        <div class="search-bar">
          <!-- Search bar can be added here if needed -->
        </div>
        <div class="header-actions">
          <div class="notification">
            <i class="fas fa-bell"></i>
            <div class="badge">3</div>
          </div>
          <div class="user-profile">
            <div class="profile-img">AP</div>
            <div class="user-info">
              <div class="user-name">Admin</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <h2>Add New User</h2>
          <?php

            // Check if the form is submitted
            if (isset($_POST['adduser'])) {
                // Get the form data
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $department = $_POST['department'];
                $role = $_POST['role'];

                // Check the role and insert into the appropriate table
                if ($role == 'teacher') {
                    // Insert data into the teachers table
                    $query = "INSERT INTO teachers (name, email, password, department) 
                              VALUES ('$name', '$email', '$password', '$department')";
                } else if ($role == 'student') {
                    // Insert data into the students table
                    $registration_date = date('Y-m-d H:i:s');  // Get the current date and time
                    $query = "INSERT INTO students (fullname, email, username, password, registration_date)
                              VALUES ('$name', '$email', '$name', '$password', '$registration_date')";
                }

                // Execute the query
                if (mysqli_query($conn, $query)) {
                    echo "New user added successfully!";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }
          ?>

        <form action="#" method="POST" class="add-user-form">
          <div class="form-group">
            <label for="username">Full name</label>
            <input type="text" id="username" name="name" required />
          </div>
          <div class="form-group">
            <label for="username">Emaill</label>
            <input type="text" id="username" name="email" required />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
          </div>
          <div class="form-group">
            <label for="email">Department</label>
            <input type="text" id="email" name="department" required />
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" required>
              
              <option value="student">Student</option>
              <option value="teacher">Lecturer</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Add user" name="adduser" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
