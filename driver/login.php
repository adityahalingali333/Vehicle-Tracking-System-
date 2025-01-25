<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 3px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        /* Added style for registration link */
        .login-container p {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Driver's Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Assuming you have an array of valid email and password combinations
                $adminCredentials = array(
                    'mohanchandu145@gmail.com' => '123456789',
                    'adtiyabh333@gmail.com' => 'password2',
                    
                );

                // Retrieve submitted email and password
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Check if submitted credentials are valid
                if (isset($adminCredentials[$email]) && $adminCredentials[$email] === $password) {
                    // Redirect to the appropriate page based on email
                    switch ($email) {
                        case 'mohanchandu145@gmail.com':
                            header('Location: home1.php');
                            break;
                        case 'adtiyabh333@gmail.com':
                            header('Location: home.php');
                            break;
                        // Add more cases for other admins
                       
                    }
                    exit();
                } else {
                    echo "<p class='error-message'>Invalid email or password</p>";
                }
            }
        ?>
        <p>Don't have an account? <a href="regsiter.php">Register here</a></p> 
    </div>
</body>
</html>
