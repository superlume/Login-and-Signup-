
<?php
include 'database.php';
$is_invalid = false;
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
//   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // $is_invalid = true;
//   } else {
    $stmt = $mysqli->prepare("SELECT id, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();

    if($user) {
        // Debugging output
        var_dump($password); // Check the password entered by the user
        var_dump($user['password_hash']);
        if (password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id();
            header("Location: index.php");
            exit();
        } else {
            $is_invalid = true;
            $message = "Incorrect Password";
        }
    } else {
        $is_invalid = true;
        $message = "Email not found";
    }   
}


// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom right, #f0f0f0, #59d98e);
        }

        .container {
            width: 80%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            position: relative;
            /* Add position relative for icon positioning */
        }

        button:hover {
            background-color: #0056b3;
        }

        .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-user-lock"></i> Login Page</h1> <!-- Add an icon to the page title -->
        <?php if($is_invalid):?>
        <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <input autocomplete="off" type="email" placeholder="Email" name="email" id="email">
            <input autocomplete="off" type="password" placeholder="Password" name="password" id="password">
            <button><i class="fas fa-sign-in-alt icon"></i>Login</button> <!-- Add Font Awesome icon to the button -->
        </form>
    </div>
</body>

</html>
