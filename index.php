<?php
session_start();  // creates a session or resumes the current one based on a session identifier passed via a GET or POST request
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <style>
    body {
        font-family: 'Lato', sans-serif;

    }

    table.dataTable {
        border-collapse: collapse !important;
    }
      /* changes size of navbar on "view astronaur page" */
    .navbar-brand {
        width: 7%;
    }
      /* change sfont on the "view astronaut page"*/
    .bg_color {
        background-color: #fff !important;
    }                   /* changes the navbar colour on the "view astronaut page" */
    </style>

</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    


    <?php include('layout/footer.php'); ?>
 
    <?php include('layout/script.php') ?>         <!-- The HTML <script> src Attribute is used to specify the URL of external JavaScript file. -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script>
    $('[data-toggle="datepicker"]').datepicker({
        autoClose: true,
        viewStart: 2,
        format: 'dd/mm/yyyy',    // allows users to input the date of birth on the "create missions" page

    });
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: false,
            dom: 'Bfrtip',


        });
    });
    </script>
</body>

</html>