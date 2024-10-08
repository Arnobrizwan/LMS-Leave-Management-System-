<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page</title>
        <link rel="stylesheet" href="./css/admin.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>

    <body>
        <div id="sideNav" class="sidenav">
            <p class="userlevel">Admin</p>
            <a href="check_login.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
            <a href="update_profile.php" class="icon-a"> <i class="fa fa-user"></i>&nbsp;&nbsp; Update Profile</a>
            <a href="add_user_form.php" class="icon-a"> <i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add New User</a>
            <a href="edit_user_info.php" class="icon-a"> <i class="fa fa-list"></i>&nbsp;&nbsp;Edit/Delete User</a>
            <a href="view_applications.php"class="icon-a"> <i class="fa fa-file-o"></i>&nbsp;&nbsp;Pending Leave Applications</a>
            <a href="leaveapp_report.php" class="icon-a"> <i class="fa fa-file-o"></i>&nbsp;&nbsp;Leave Applications Report</a>
            <a href="apply_leave.php"class="icon-a"> <i class="fa fa-th"></i>&nbsp;&nbsp;Apply for a Leave</a>
            <a href="leave_result.php"class="icon-a"> <i class="fa fa-files-o"></i>&nbsp;&nbsp;Result of Latest Application</a>
            <a href="leave_history.php"class="icon-a"> <i class="fa fa-files-o"></i>&nbsp;&nbsp;Leave Application History</a>
           <br>
            <a href="logout.php"class="icon-a"> <i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
        </div>
        <div id="main">
        <div id="header">
            <div class="col-div-6">
            <span style="font-size:30px;cursor:pointer; color: white;" class="nav">&#9776; Dashboard</span>
            </div>
            <div class="col-div-6">
            <div class="profilepic">
                <img src="./css/images/UserPhoto.png" class="pro-img" />
                <p>
                <!-- <?php echo $_SESSION["USER"]?>
                <br>
                <?php echo $_SESSION["id"]?> -->
                </p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
    <br/>

       
            <?php
            include("./DATABASE_FILES/config.php");
            $sql = "SELECT * FROM user";
            if ($result = mysqli_query($conn,$sql)) {
                $usercount = mysqli_num_rows($result);
            }
            ?>
            <div class="card">
                <div class="box">
                    <p><?php echo $usercount?>
                    <span>Total Users</span></p><br>
                    <i class="fa fa-list box-icon"></i>
                   
                </div>
            </div>
            <?php
            include("./DATABASE_FILES/config.php");
            $sql = "SELECT * FROM NewApplication";
            if ($result = mysqli_query($conn,$sql)) {
                $newappcount = mysqli_num_rows($result); 
            }
            ?>
            <div class="card">
                <div class="box">
                    <p><?php echo $newappcount?>
                    <span>Pending Applications</span></p><br>
                    <i class="fa fa-list box-icon"></i>
                </div>
            </div>
            <?php
            include("./DATABASE_FILES/config.php");
            $sql = "SELECT * FROM form";
            if ($result = mysqli_query($conn,$sql)) {
                $appcount = mysqli_num_rows($result); 
            }
            ?>
            <div class="card">
                <div class="box">
                    <p><?php echo $appcount?>
                    <span>Approved Applications</span></p><br>
                    <i class="fa fa-list box-icon"></i>
                </div>
            </div>
            <div class="clearfix"></div>
        <br/><br/>

        
        </div>
      

    </body>
    
</html>