<?php
require('./DATABASE_FILES/create_database.php');
require('./DATABASE_FILES/create_user_table.php');
require('./DATABASE_FILES/create_form_table.php');
require('./DATABASE_FILES/create_NewApplication_table.php');
require('./DATABASE_FILES/insert_user_data.php');
require('./DATABASE_FILES/insert_form_data.php');
require('./DATABASE_FILES/insert_newApplications_data.php');
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

    
    <head>
        <title>Index Page</title>
        <link rel="stylesheet" href="./css/index.css">
    </head>

    <body>
        <h1>Welcome To<strong>Leave Management System</strong><br><button onclick="window.location.href='login.php';"><h2>Let's Start</h2></button></h1>
        <br><br>
       
    </body>

</html>