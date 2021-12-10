<?php
session_start();   // creates a session or resumes the current one based on a session identifier passed via a GET or POST request

include('class/config.php'); // connects file to the database
class signInUp extends database
{
    protected $link;
    public function signUpFunction()
    {
        $sql = "SELECT * from mission";  // The SELECT statement is used to select data from a database. The data returned is stored in a result table
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        
    }
}
$obj = new signInUp;
$objSignUp = $obj->signUpFunction();

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
    body {   /* changes font type for the "view missions" page */
        font-family: 'Lato', sans-serif;

    }   

    table.dataTable {
        border-collapse: collapse !important;
    }
         /* resizes navbar on the "view missions" page */
    .navbar-brand {
        width: 7%;
    }
          
    .bg_color {     /* changes navbar colour for the "view missions" page */
        background-color: #fff !important;
    }
    </style>

</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container bg-white pr-4 pl-4  log_section pb-5">

            <div class="">


                <!-- <form action="" method="post"> -->
                <div class="">
                    <h4 class="font-weight-bold pt-5 text-center">View Mission</h4>
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Destination</th>
                                <th>Lunch Date</th>
                                <th>Type</th>
                                <th>Crew Size</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($objSignUp) { ?>
                            <?php while ($row = mysqli_fetch_assoc($objSignUp)) { ?>
                            <tr>
                                <th><?php echo $row['mission_id'] ?></th>    <!-- Returns an numerical array of strings that corresponds to the fetched row, or false if there are no more rows The row is returned as an array. -->
                                <th><?php echo $row['destination']; ?></th>
                                <th><?php echo $row['launch_date']; ?></th>
                                <th><?php echo $row['type']; ?></th>
                                <th><?php echo $row['crew_size']; ?></th>

                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>



                    </table>
                </div>
                <!-- </form> -->
            </div>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>                    <!-- The HTML <script> src Attribute is used to specify the URL of external JavaScript file. -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script>
    $('[data-toggle="datepicker"]').datepicker({
        autoClose: true,
        viewStart: 2,
        format: 'dd/mm/yyyy',     // displays the date of birth section on the "create missions" tab and allows users to input the date of birth on the "create missions" page

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