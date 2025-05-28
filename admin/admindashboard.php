<?php require_once '../dbconnect.php'?>
<?php
  if(!isset($_SESSION['admin_id'])){
    header('location:adminlogin.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../style.css" />
    <!-- Add Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require_once 'sidebar.php' ?>

      <!-- Header -->
      <div class="header">
        <div class="search-bar"></div>
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
        <div class="stats-cards">
          <div class="stat-card">
            <div class="card-header">
              <div>
                <div class="card-value">250</div>
                <div class="card-label">Total Students</div>
              </div>
              <div class="card-icon purple">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <div class="stat-card">
            <div class="card-header">
              <div>
                <div class="card-value">324</div>
                <div class="card-label">Active Student User</div>
              </div>
              <div class="card-icon green">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- User-Related Metrics Section -->
        <div class="user-metrics">
          <div class="metric-card">
            <div class="metric-header">
              <div>
                <div class="metric-value">120</div>
                <div class="metric-label">Total Users</div>
              </div>
            </div>
          </div>
          <div class="metric-card">
            <div class="metric-header">
              <div>
                <div class="metric-value">15</div>
                <div class="metric-label">New Users This Week</div>
              </div>
            </div>
          </div>
          <div class="metric-card">
            <div class="metric-header">
              <div>
                <div class="metric-value">30</div>
                <div class="metric-label">Inactive Users</div>
              </div>
            </div>
          </div>
          
          <!-- Pie Chart for User Roles Breakdown -->
          <!-- Pie Chart for User Roles Breakdown -->
<div class="metric-card">
  <div class="metric-header">
    <div>
      <div class="metric-label">User Roles Breakdown</div>
    </div>
  </div>
  <canvas id="userRolesChart" width="100" height="100"></canvas>  <!-- Smaller canvas size -->
</div>

        </div>

      </div>
    </div>

    <script>
      // Data for User Roles Pie Chart
      var ctx = document.getElementById('userRolesChart').getContext('2d');
      var userRolesChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Admin', 'Teacher', 'Student'],
          datasets: [{
            label: 'User Roles',
            data: [40, 30, 30],  // Example data
            backgroundColor: ['#3498db', '#2ecc71', '#f39c12'],
            borderColor: ['#2980b9', '#27ae60', '#e67e22'],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                }
              }
            }
          }
        }
      });
    </script>
  </body>
</html>
