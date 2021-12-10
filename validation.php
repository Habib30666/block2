<?php                         // this code provides the validation e.g. if box is left empty or incorrect data inputted it dispays "please fill in the field"
function test_input($data) {
    $data = trim($data);      // validation from w3schools "https://www.w3schools.com/php/php_form_validation.asp"
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }