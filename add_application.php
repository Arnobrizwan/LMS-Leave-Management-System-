<?php
session_start();

echo "User ID: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'Not Set') . "<br>";
echo "Login Status: " . (isset($_SESSION['Login']) ? $_SESSION['Login'] : 'Not Set') . "<br>";
echo "Level: " . (isset($_SESSION['LEVEL']) ? $_SESSION['LEVEL'] : 'Not Set') . "<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (your authentication logic to get $fetched_user_id, $fetched_username, $hashed_password from the database)

    if ($fetched_username && password_verify($_POST['password'], $hashed_password)) {
        $_SESSION['user_id'] = $fetched_user_id; 
        $_SESSION['Login'] = "YES"; 
        $_SESSION['LEVEL'] = $fetched_user_level; // From the database
        header("Location: dashboard.php"); 
        exit();
    } else {
        // Invalid credentials
        $error_message = "Invalid username or password";
    }
}



// Check for existing session (user already logged in?)
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if not logged in
    header('Location: login.php');
    exit;
}

// Additional Security Checks
if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != "YES") {
    // Invalid login status, redirect to login
    header("Location: login.php");
    exit; 
}
if (!isset($_SESSION["LEVEL"]) || ($_SESSION["LEVEL"] != 1 && $_SESSION["LEVEL"] != 3)) {
    // Insufficient privileges, redirect or display error
    header("Location: access_denied.php"); // Create an error page
    exit;
}

// Leave Application Submission (only if user has access)
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $id = $_SESSION["user_id"]; // Use session user_id for consistency
    $name = $_POST["name"];
    $days = $_POST["numdays"];
    $reason = $_POST["reason"];
    $status = "Decision Pending";
    $StartDate = $_POST["start_date"];
    $EndDate = $_POST["end_date"];

    $_SESSION["Start_Date"] = $StartDate;
    $_SESSION["End_Date"] = $EndDate;

    require("./DATABASE_FILES/config.php");

    // Prepared Statement (Important for security!)
    $sql = "INSERT INTO NewApplication (id, name, StartDate, EndDate, days, reason, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issssss", $id, $name, $StartDate, $EndDate, $days, $reason, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>
                alert("Leave application applied!");
                window.location.href="check_login.php"; // Or redirect to a confirmation page
              </script>';
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Leave Application</title>
    <style>
        /* Add some basic styling (optional) */
        body { font-family: sans-serif; }
        form { width: 300px; margin: 0 auto; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; }
        input[type="submit"] { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>

    <h2>Apply for Leave</h2>

    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <label for="numdays">Number of Days:</label>
        <input type="number" id="numdays" name="numdays" required><br><br>

        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
    

</body>
</html>


