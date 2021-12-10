<?php
session_start(); // creates a session or resumes the current one based on a session identifier passed via a GET or POST request

include('class/config.php');
class signInUp extends database
{
    protected $link;
    public function signUpFunction()
    {
        include('./validation.php');  // Validation in PHP is the process where we check if the input information in the various fields in any form such as text or checkbox ect.
        if (isset($_POST['signup'])) {
            //addslashes take different ascii value and trim will remove start and last white space
            $name = test_input($_POST['mission_id']);
            $destination = test_input($_POST['destination']);
            $date = test_input($_POST['date']);
            $type = test_input($_POST['type']);
            $crew = test_input($_POST['crew']);

            // The INSERT INTO statement is used to insert new records in a table.
            $sql = "INSERT INTO `mission` (`mission_id`, `destination`, `launch_date`, `type`, `crew_size`, `target_id`) VALUES ('$name', '$destination', '$date', '$type', '$crew', '')";
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
    body {       /* changes font type for "create mission" tab */
        font-family: 'Lato', sans-serif;

    }

    .navbar-brand {  /* resizes navbar on "Create mission" page */ 
        width: 7%;
    }

    .bg_color {         /* changes colour of the navbar for create mission*/
        background-color: #fff !important;
    }
    </style>

</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?> <!-- // Validation in PHP is the process where we check if the input information in the various fields in any form such as text or checkbox ect.-->

    <section>
        <div class="container bg-white pr-4 pl-4  log_section pb-5">

            <div class="row">


                <!-- <form action="" method="post"> -->
                <div class="col-md-6 offset-3 ">
                    <h4 class="font-weight-bold pt-5 text-center">Create Mission</h4>
                    <?php if ($objSignUp) { ?>
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php echo $objSignUp; ?></strong>
                    </div>
                    <?php } ?>
                    <form action="" method="post" enctype="multipart/form-data" class="form-group"
                        data-parsley-validate>



                                   <!-- allows users to enter data on the "create missions" tab-->
                        <input name="mission_id" type="text" class="form-control p-4  bg-light" placeholder="Name" required>
                        <input name="destination" type="text" class="form-control p-4 mt-4  bg-light"      
                            placeholder="Destination" required>
                        <input name="date" type="date" class="form-control p-4 mt-4  bg-light" placeholder="Launch Date"
                            data-toggle="datepicker" required>
                        <input name="type" type="text" class="form-control p-4 mt-4  bg-light" placeholder="Type"
                            required>
                        <input name="crew" min="1" type="number" class="form-control p-4 mt-4  bg-light"
                            placeholder="Crew Size" required>



                        <button name="signup" type="submit"
                            class="btn btn-block font-weight-bold log_btn btn-lg mt-4">SUBMIT</button>   <!-- this displays the submit button which allows data to be saved on a table -->

                    </form>
                </div>
                <!-- </form> -->
            </div>

        </div>

    </section>

        <!--  The include (or require ) statement takes all the text/code/markup that exists in the specified file and copies it into the file that uses the include statement.-->
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
        autoHide: true,
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