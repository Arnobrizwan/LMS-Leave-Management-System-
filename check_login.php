<?php
session_start();
require('./DATABASE_FILES/config.php'); 

// // Error reporting (enable in development, disable in production)
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input 
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    // --- Debugging: Print the sanitized username ---
    error_log("Sanitized Username: " . $username);  

    // Prepare and execute the query (using prepared statements)
    $stmt = $conn->prepare("SELECT * FROM user WHERE LOWER(username) = ?"); 
    $stmt->bind_param("s", strtolower($username)); 
    $stmt->execute();
    $result = $stmt->get_result();

    // --- Debugging: Check the number of rows returned ---
    error_log("Query Result: " . $result->num_rows . " rows found");

    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();

        // --- Debugging: Print the fetched row ---
        error_log("Fetched Row: " . print_r($row, true));

        // Verify password (assuming you are using password_verify)
        if ($_POST['password']== $row["password"]) {
            // Successful login, start session and regenerate session ID
            $_SESSION["Login"] = "YES";
            $_SESSION["USER"] = $row["username"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["LEVEL"] = $row["level"];
            session_regenerate_id(true);
            
            $_COOKIES["Login"] = "YES";
            $_COOKIES["USER"] = $row["username"];
            $_COOKIES["id"] = $row["id"];
            $_COOKIES["LEVEL"] = $row["level"];// Prevent session fixation

            // Redirect based on user level
            $redirect = [
                1 => "admin_mainpage.php",
                2 => "manager_mainpage.php",
                3 => "staff_mainpage.php"
            ];
            header("Location: " . $redirect[$row['level']]);
            exit();
        } else {
            // Incorrect password
            $error_message = "Invalid password.";
        }
    } else {
        // User not found
        $error_message = "Invalid username.";
    }

    // Display error message (you can customize this)
    echo '<script>alert("' . $error_message . '"); window.location.href="login.php";</script>';
} else {
    // Check if the user is already logged in
    if (isset($_SESSION["Login"]) && $_SESSION["Login"] === "YES") {
        // Redirect based on user level if already logged in
        $redirect = [
            1 => "admin_mainpage.php",
            2 => "manager_mainpage.php",
            3 => "staff_mainpage.php"
        ];
        header("Location: " . $redirect[$_SESSION['LEVEL']]);
        exit();
    }
}

// Close database connection
mysqli_close($conn); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Basic styling for the form (you can customize) */
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
?>



