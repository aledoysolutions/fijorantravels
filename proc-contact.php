<?php

$name = $_POST['name'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$travel_date = $_POST['travel_date'];
$information = $_POST['information'];

$name_convert = ucwords($name);

if(!$name || !$email || !$contact_number || !$travel_date || !$information){
    $msg = 'error';
    $comment = 'All information required';
    include('contact.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'error';
    $comment = 'Please enter a valid email';
    include('contact.php');
    exit;
}

if (strlen($contact_number) != 11) {
    $msg = 'error';
    $comment = 'Please enter valid GSM number';
    include('contact.php');
    exit;
}

if (strlen($information) > 30 ) {
    $msg = 'error';
    $comment = 'Additional information shouln\'t be more than 30 Words.';
    include('contact.php');
    exit;
}
 

//write the code to send the details to email

             $content = 'Name: '.$name_convert."\n".
                'Email : ' .$email."\n".
                'Contact_number : '.$contact_number."\n".
                'Travel_date : '.$travel_date."\n".
                'Information : '.$information."\n".
                '================================================' . "\n";

     $to = 'Francisnwankwo37@gmail.com';
     $sub = 'Client Trip Booking Info';
     $from = "From: noreply@aledoy.com";  

    mail($to,$sub,$content,$from); 

    $myFile = fopen("contact_us_datas.txt","a");
    fwrite($myFile,$content);
    fclose($myFile);


//show succesful message

    $msg = 'success';
    include('contact.php');

?>