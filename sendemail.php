<?php
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$text = $_GET['text'];


    $fullname = $firstname . ' ' . $lastname;
    $to = ' 	angelinaromeo728@gmail.com';
    $subject = 'Lillies Paintings Contact - Subject: ' . $_GET['subject'] . '; Name: ' . $fullname . ' (' . $email . ') ';
    $headers = 'From: ' . $email . '\r\n' .
        'Reply-To: ' . $email . '\r\n' .
        'X-Mailer: PHP/' . phpversion();
    
    // mail($to, $subject, $text, $headers);

    echo ('***mail() is commented out for testing purposes only*** ' .
        '--Email will look like the following: ' . 
        '--To: ' . $to . ' ' .
        '--Subject: ' . $subject . ' ' .
        '--Text: ' . $text .  ' ' .
        '--Headers: ' . $headers);

?> 