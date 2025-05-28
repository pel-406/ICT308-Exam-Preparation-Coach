<?php  require_once '../dbconnect.php'?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Crown Institute of Higher Education</title>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Animate.css for animations (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- External CSS (Optional, if you have style.css) -->
    <link rel="stylesheet" href="../style.css" />

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background: url('../images/background.jpg') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
      }

      .overlay {
        background-color: rgba(0, 0, 0, 0.7); /* Dark overlay */
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px;
        box-sizing: border-box;
      }

      .logo {
        position: absolute;
        top: 20px;
        left: 20px;
      }

      .logo img {
        width: 150px;
        height: auto;
      }

      .teacher-login-link {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 14px;
        color: #fff;
      }

      .teacher-login-link a {
        color: #fff;
        text-decoration: none;
      }

      .teacher-login-link a:hover {
        text-decoration: underline;
      }

      .school-name {
        color: #ffffff;
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
      }

      .login-container {
        background-color: #ffffff;
        padding: 40px 30px;
        border-radius: 10px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
      }

      .login-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
      }

      .login-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
      }

      .login-container button {
        width: 100%;
        padding: 12px;
        background-color: #2196f3;
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .login-container button:hover {
        background-color: #1976d2;
      }

      .forgot-password {
        margin-top: 10px;
        font-size: 14px;
      }

      .forgot-password a {
        color: #2196f3;
        text-decoration: none;
      }

      .forgot-password a:hover {
        text-decoration: underline;
      }

      @media (max-width: 480px) {
        .login-container {
          padding: 30px 20px;
        }

        .school-name {
          font-size: 24px;
        }
      }
    </style>
  </head>
  <body>
    <div class="overlay">
      
      <!-- Logo -->
      <div class="logo">
        <img src="../images/logo.PNG" alt="Logo" />
      </div>

      <!-- Admin Login Link -->
      <div class="teacher-login-link">
        <a href="../teacher/teacherlogin.php">Teacher Login</a>
      </div>

      <!-- School Heading -->
      <div class="school-name">Crown Institute of Higher Education</div>

      <!-- Login Form -->
      <div class="login-container">
        <h2>Login</h2>
        <?php
          if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM admins WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($conn,$query);

            if(mysqli_num_rows($result) == 1){
              $data = mysqli_fetch_assoc($result);
              $_SESSION['admin_id'] = $data['id'];
              $_SESSION['admin_email'] = $data['email'];
              echo "<script type='text/javascript'>
                      window.location.href = 'admindashboard.php';
                    </script>";
          }
            else{
              $_SESSION['error'] = "Invalid username or password";
              echo "<p style='color:red'>Invalid email or password</p>";
            }
          }
        ?>
        <form action="#" method="post">
          <input type="text" id="username" name="email" placeholder="Username" required />
          <input type="password" id="password" name="password" placeholder="Password" required />
          <input type="submit" value="Login" name="login">
        </form>
      </div>
    </div>
  </body>
</html>
