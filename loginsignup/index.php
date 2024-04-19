
<?php
include 'database.php';
session_start();

if(isset($_SESSION["user_id"]))
{
  $user_id = $_SESSION["user_id"];
  $stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();    
  } else {
    header("Location: login.php");
    exit();
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom right, #f0f0f0, #59d98e); 
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 400px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      text-align: center;
    }

    h1 {
      color: #333333;
      margin-bottom: 30px;
      font-weight: 600;
    }

    p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    a {
      color: #4CAF50;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Home Page</h1>

    <?php if(isset($user)): ?>
      <p>Hello, <?= htmlspecialchars($user["username"]); ?>. You are now logged In.</p>
      <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
      <p>Welcome! Please <a href="login.php">Login</a> or <a href="signup.php">SignUp</a></p>
    <?php endif; ?>

  </div>
</body>

</html>
