
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to bottom right, #f0f0f0, #59d98e);
        }

        .container {
            width: 90%;
            max-width: 400px;
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .fas {
            margin-right: 5px;
        }

        .button-content {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-user-plus"></i> Sign Up</h1>
        <form action="process_signup.php" method="POST" novalidate>
            <input autocomplete="off" type="text" placeholder="Your Username" name="username">
            <input autocomplete="off" type="email" placeholder="Your Email" name="email">
            <input autocomplete="off" type="password" placeholder="Your Password" id="password" name="password">
            <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
            <button>
                <span class="button-content">
                    <i class="fas fa-user-check"></i>
                    Sign Up
                </span>
            </button>
            <div class="signup-link">Already have an account? <a href="login.php"><i class="fas fa-sign-in-alt"></i> Log in</a></div>
        </form>
    </div>
</body>

</html>
