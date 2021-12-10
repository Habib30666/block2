<?php
session_start(); // creates a session or resumes the current one based on a session identifier passed via a GET or POST request

include('class/config.php');
class signInUp extends database
{
    protected $link;
    public function signUpFunction()
    {    //SQL is used to communicate with a database. 
        $sql = "SELECT * from attends";   //  The SELECT statement is used to select data from a database. The data returned is stored in a result table, called the result-set.
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
    body {   /* changes font for the "view attends" page */ 
        font-family: 'Lato', sans-serif;

    }

    table.dataTable {
        border-collapse: collapse !important;
    }

    .navbar-brand {   /* resizes navbar on the "view attends" page */ 
        width: 7%;
    }

    .bg_color {      /* changes navbar colour on thr "view attends" page */ 
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
                                <th>Missions ID</th>
                                <th>Number of Missions</th>
                                <th>Astronaut ID</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($objSignUp) { ?>
                            <?php while ($row = mysqli_fetch_assoc($objSignUp)) { ?>  <!-- while loop will always execute the block of code once, it will then check the condition, and repeat the loop while the specified condition is true -->
                            <tr>
                                <th><?php echo $row['missions_id']; ?></th>
                                <th><?php echo $row['no_missions']; ?></th>
                                <th><?php echo $row['astronaut_id']; ?></th>
                                

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

    <?php include('layout/script.php') ?>           <!-- The HTML <script> src Attribute is used to specify the URL of external JavaScript file. -->
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