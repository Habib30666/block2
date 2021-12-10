
<?php
session_start(); // creates a session or resumes the current one based on a session identifier passed via a GET or POST request
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('/layout/style.php'); ?>


    <style>
    .navbar-brand {  /* changes navbar width size for the navbar for the homepage*/
        width: 10% !important;
    }

    .bg_color {   /* changes navbar colour on the homepage*/ 
        background-color: #fff !important;
    }

    body {     /* changes font type on the homepage (index) */
        font-family: 'Raleway', sans-serif;
    }

  

    section {
        padding: 60px 0;
    }

   
    </style>


</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>





    <div class="container"> <!-- dislays text on the home page -->
        <h1 class="text-center mt-3">Home Page</h1>
    </div>

    <a href="createAstronaut.php">create Astrounaut</a>
	<a href="createMission.php">create Mission</a>      <!-- creates links on the homepage to navigate to other pages-->
    <a href="createtargets.php">create targets</a>
	<a href="viewAstronaut.php">View Astronauts</a>
	<a href="viewMission.php">View Missions</a>


    <?php include('layout/script.php') ?>


</body>

</html>