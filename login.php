<?php
session_start();

include_once('dbconnect.php');

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter your username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, passkey FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                
                mysqli_stmt_store_result($stmt);

                
                if (mysqli_stmt_num_rows($stmt) == 1) {
                
                    mysqli_stmt_bind_result($stmt, $id, $username, $stored_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password === $stored_password) { // Compare plain text passwords
                            
                            session_regenerate_id(true);
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                        
                            echo "<script> window.location.href='inventory.php';</script>";
                            exit();
                        } else {
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

    
            mysqli_stmt_close($stmt);
        }
    }

    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login</title> 
    <link rel="stylesheet" href="style.css">
</head> 
<style>

    body::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("ll.jpg");
  background-position: center;
  background-size: cover;
  
}
.wrapper {
  width: 400px;
  border-radius: 8px;
  padding: 30px;
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  margin-left: 1%;
}
    </style>

<body> 
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Login</h2>
            <?php 
            if (!empty($login_err)) {
                echo '<div class="alert" style="color:red;">' . htmlspecialchars($login_err) . '</div>';
            }
            ?>
            <div class="input-field">
                <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                <label>Username: </label>
            </div>

            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter your password</label>
            </div>

            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember me</p>
                </label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit">Log In</button>
            <div class="register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form> 
    </div>
</body> 
</html>
