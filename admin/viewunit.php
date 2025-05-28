<?php
require_once '../dbconnect.php';

// Query to fetch all courses along with their instructors
$query = "
    SELECT c.course_id, c.course_code, c.course_name, t.name AS instructor_name
    FROM courses c
    JOIN teachers t ON c.instructor_id = t.teacher_id
";

// Execute the query
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Units</title>
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
        <h2>View Units</h2>
        <table class="unit-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Lecturer/Coordinator</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Check if the query returned any rows
            if (mysqli_num_rows($result) > 0) {
                // Loop through the results and display them in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['course_code'] . "</td>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['instructor_name'] . "</td>";
                    echo "<td>
                            <button class='delete-btn'>
                              <i class='fas fa-trash'></i>
                            </button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No courses found.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
