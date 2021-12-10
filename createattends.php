<?php
session_start();  // creates a session or resumes the current one based on a session identifier passed via a GET or POST request
 
include('class/config.php');
class signInUp extends database
{
    protected $link;
    function signUpFunction()
    {
        include('./validation.php');  // Validation in PHP is the process where we check if the input information in the various fields in any form such as text or checkbox ect.

        if (isset($_POST['signup'])) {
            //This test_input function is coming from validation.php
            $mission_id = test_input($_POST['mission_id']);
            $no_missions = test_input($_POST['no_missions']);
            $astronaut_id = test_input($_POST['astronaut_id']);
            //Insert data to database
            $sql = "INSERT INTO `attends`(`missions_id`,`no_missions`,`astronaut_id`) VALUES ('$mission_id', '$no_missions', '$astronaut_id')";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                return 'Successfully Created';
            } else {
                return false;
            }
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

    <style>
    body {   /* this allows users to chnage fonts*/ 
        font-family: 'Lato', sans-serif;

    }
           /* allows users to change the seizing of the navbar */
    .navbar-brand {
        width: 7%;
    }
               /* changes the navbar colour */
    .bg_color {
        background-color: #fff !important;
    }
    </style>

</head>
       
<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container bg-white pr-4 pl-4  log_section pb-5">

            <div class="row">


                <div class="col-md-6 offset-3 ">
                    <h4 class="font-weight-bold pt-5 text-center">Create Attends</h4>
                    <?php if ($objSignUp) { ?>
                    <!-- This if will call when data is inserted successfully -->
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php echo $objSignUp; ?></strong>
                    </div>
                    <?php } ?>
                    <form action="" method="post" enctype="multipart/form-data" class="form-group"
                        data-parsley-validate>




                        <input name="mission_id" type="number" class="form-control p-4  bg-light" placeholder="mission_id" required>
                        <input name="no_missions" min="0" type="number" class="form-control p-4 mt-4  bg-light"
                            placeholder="Number Missions" required>
                        <input name="astronaut_id" min="0" type="number" class="form-control p-4 mt-4  bg-light"
                            placeholder="astronaut_id" required>



                        <button name="signup" type="submit"
                            class="btn btn-block font-weight-bold log_btn btn-lg mt-4">SUBMIT</button>  <!-- this displays the submit button which allows data to be saved on a table -->

                    </form>
                </div>
            </div>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <?php include('layout/script.php') ?>

    <script src="js/datepicker.js"></script>
    <script>
    $('[data-toggle="datepicker"]').datepicker({
        autoClose: true,
        viewStart: 2,
        format: 'dd/mm/yyyy',         // allows users to input the date of birth on the "create missions" page

    });
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>

</html>