<!DOCTYPE html>
<html>
    <head>
        <title>Staff Main Page</title>
        <link rel="stylesheet" href="./css/staff.css" />
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
    </head>

    <body>
      <input type="checkbox" id="check" />
   
      <header>
        <label for="check">
          <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
          <h3>Staff <span>Dashboard</span></h3>
        </div>
       
      </header>
     

        <div id="sidebar" class="sidebar">
          <center>
          <img src="./css/images/profile.png" class="profile_image" alt="" />
          <!-- <h4><?php echo $_SESSION["USER"] ?></h4> -->
        </center>
            <!-- <p class="userlevel">Staff</p> -->
            <a href="check_login.php"><i class="fas fa-bars"></i><span>Dashboard</span></a>
            <a href="update_profile.php"><i class="fas fa-user"></i><span>Update Profile</span></a>
            <a href="apply_leave.php"><i class="fas fa-th"></i><span>Apply for a Leave</span></a>
            <a href="leave_result.php"><i class="fas fa-copy"></i><span>Result of Latest Application</span></a>
            <a href="leave_history.php"><i class="fas fa-user"></i><span>Leave Application History</span></a>
            <br><br>
            <logout>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </logout>
        </div>
        <div class="content"></div>
        <div id="header">
            <span style="font-size: 40px; cursor: pointer; color: #fff;" class="headnav">Dashboard</span>
            <div class="profilepic">
                <img src="" class="pfp" />
                <p>
                    <?php echo $_SESSION["USER"]?>
                    <br>
                    <?php echo $_SESSION["id"]?>
                </p>
            </div>
        </div>
    </body>

</html>