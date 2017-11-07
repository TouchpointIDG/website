<?php

    require 'contact.class.php';

    // Check for empty fields
    if(
           empty($_POST['name'])  		||
           empty($_POST['email']) 		||
           empty($_POST['phone']) 		||
           empty($_POST['message'])     ||
           empty($_POST['priority'])	||
           !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
       )
    {
        header('Location: https://www.tpidg.us/contact/');
        exit();
    }

    //associative array to pass to contact class
    $content = array("Name"=>$_POST['name'], "Email"=>$_POST['email'], "Phone"=>$_POST['phone'], "Message"=>$_POST['message'], "Priority"=>$_POST['priority'], "IP"=>$_SERVER['HTTP_X_FORWARDED_FOR']);

    //creates a new object of the contact class
    $contacter = new contact();
    $priority = $_POST['priority'];

    $contacter->communicateWithAdmins($content, $priority);

    header('Location: https://www.tpidg.us/contact/contacted.php');
    exit();
?>
