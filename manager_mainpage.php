<!DOCTYPE html>
<html>
    <head>
        <title>Manager Main Page</title>
        <link rel="stylesheet" href="./css/manager.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div id="sideNav" class="sidenav">
            <p class="userlevel">Manager</p>
            <a href="check_login.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
            <a href="update_profile.php" class="icon-a"><i class="fa fa-user"></i> &nbsp;&nbsp;Update Profile</a>
            <a href="view_applications.php" class="icon-a"><i class="fa fa-edit"></i> &nbsp;&nbsp;View Leave Applications</a>
            <a href="leaveapp_report.php" class="icon-a"><i class="fa fa-file"></i> &nbsp;&nbsp;View Leave Applications Report</a>
            <br><br>
            <a href="logout.php" class="icon-a"><i class="fa fa-sign-out"></i> &nbsp;&nbsp;Logout</a>
        </div>
        <div id="main">
        <div id="header">
            <div class="col-div-6">
            <!-- <span style="font-size: 40px; cursor: pointer; color: #fff;" class="headnav">Dashboard</span> -->
            <span style="font-size:30px;cursor:pointer; color: white;" class="nav">&#9776; Dashboard</span>
            <!-- <span style="font-size:30px;cursor:pointer; color: white;" class="nav2">&#9776; Dashboard</span> -->
           </div>
           <div class="col-div-6">
            <div class="profilepic">
                <img src="./css/images/UserPhoto.png" class="pro-img" />
                <p>
                    <!-- <?php echo $_SESSION["USER"]?>
                    <br>
                    <?php echo $_SESSION["id"]?> -->
                </p>
                <p id="demo"></p>
            </div>
        </div>

        <script>
            document.getElementById("demo").innerHTML = "Date : " + Date();
        </script>

       
            <?php
            include("./DATABASE_FILES/config.php");
            $sql = "SELECT * FROM user";
            if ($result = mysqli_query($conn,$sql)) {
                $usercount = mysqli_num_rows($result);
            }
            ?>
            <div class="card">
                <div class="box">
                    <?php echo $usercount?>
                    <p><br><span>Total Users</span></p><br>
                    <i class="fa fa-list box-icon"></i>
                </div>
            </div><br>
            <?php
            include("./DATABASE_FILES/config.php");
            $sql = "SELECT * FROM NewApplication";
            if ($result = mysqli_query($conn,$sql)) {
                $newappcount = mysqli_num_rows($result); 
            }
            ?>
            <div class="card">
                <div class="box">
                    <?php echo $newappcount?>
                    <p></br><span>Pending Applications</span></p>
                    <i class="fa fa-list box-icon"></i>
                </div>
            </div><br>
            <?php
            include("./DATABASE_FILES/config.php");
            $sql = "SELECT * FROM form";
            if ($result = mysqli_query($conn,$sql)) {
                $appcount = mysqli_num_rows($result); 
            }
            ?>
            <div class="card">
                <div class="box">
                    <?php echo $appcount?>
                    <p><br><span>Approved Applications</span></p>
                    <i class="fa fa-list box-icon"></i>
                </div>
            </div><br>
        </div>

    </body>
    
</html>