<?php
require_once '../dbconnect.php';

$query_students = "SELECT * FROM students";
$query_teachers = "SELECT * FROM teachers";

$result_students = mysqli_query($conn, $query_students);
$result_teachers = mysqli_query($conn, $query_teachers);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Users</title>
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
        <h2>View Users</h2>
        <table class="user-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($result_students) > 0) {
                while ($data = mysqli_fetch_assoc($result_students)) {
                    echo "<tr>";
                    echo "<td>" . $data['std_id'] . "</td>";
                    echo "<td>" . $data['fullname'] . "</td>";
                    echo "<td>" . $data['email'] . "</td>";
                    echo "<td>Student</td>";
                    echo "</tr>";
                }
            }
            ?>

            <?php
            if (mysqli_num_rows($result_teachers) > 0) {
                while ($data = mysqli_fetch_assoc($result_teachers)) {
                    echo "<tr>";
                    echo "<td>" . $data['teacher_id'] . "</td>";
                    echo "<td>" . $data['name'] . "</td>";
                    echo "<td>" . $data['email'] . "</td>";
                    echo "<td>Teacher</td>";
                    echo "</tr>";
                }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
