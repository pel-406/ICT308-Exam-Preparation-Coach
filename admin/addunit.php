<?php
require_once '../dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Unit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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
        <h2>Add New Unit</h2>
        <?php
            // Check if the form is submitted
            if (isset($_POST['addunit'])) {
              // Get the form data
              $course_code = $_POST['code'];
              $course_name = $_POST['name'];
              $description = $_POST['description'];
              $credits = $_POST['credits'];
              $department = $_POST['department'];
              $instructor_id = $_POST['instructor_id'];

              // SQL query to insert course data into the courses table
              $query = "INSERT INTO courses (course_code, course_name, description, credits, department, instructor_id) 
                        VALUES ('$course_code', '$course_name', '$description', '$credits', '$department', '$instructor_id')";

              // Execute the query
              if (mysqli_query($conn, $query)) {
                  echo "<p style='color:green'>New course added successfully!</p>";
              } else {
                  echo "Error: " . $query . "<br>" . mysqli_error($conn);
              }
            }

        ?>
        <form action="#" method="POST" class="add-user-form">
          <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" id="code" name="code" required />
          </div>
          <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" id="name" name="name" required />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="credits">Credits</label>
            <input type="number" id="credits" name="credits" required />
          </div>
          <div class="form-group">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" required />
          </div>
          <div class="form-group">
            <label for="instructor_id">Instructor</label>
            <select id="instructor_id" name="instructor_id" required>
              <option value="">Select Instructor</option>
              <?php
              // Fetch instructors from the teachers table
              $result = mysqli_query($conn, "SELECT teacher_id, name FROM teachers");
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['teacher_id'] . "'>" . $row['name'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" name="addunit" class="btn-submit">Add Unit</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
