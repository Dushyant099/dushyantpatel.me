<?php
/**
 * Created by PhpStorm.
 * User: Dushyant
 * Date: 2016-05-10
 * Time: 12:56 PM
 */


require 'PHPMailerAutoload.php';
print_r($_POST);

if (isset($_POST['firstName'])) {

    /* Field 1 */

    $firstName = $_POST['firstName'];

    /* Field 2 */

    $lastName = $_POST['lastName'];

    /* Field 3 */

    $email = $_POST['email'];

    /* Field 4 */

    $company = $_POST['company'];

    /* Field 5 */

    $phoneNumber = $_POST['phoneNumber'];

    /* Field 6 */

    $message = $_POST['msg'];

    /* Message's Body */

    $body = "New mail from <br/><br/>Name: $firstName<br/><br/>Email: $email";
//    'Hi,<br><br>'.
//    'We have received a new message: <br><br>'.
//    'Name: '.$firstName.' '.$lastName.'<br><br>'.
//    'Email: '.$email.'<br><br>'
    if ($company != '') {
        $body .= 'Company: ' . $company . '<br><br>';
    }
    if ($phoneNumber != '') {
        $body .= 'Phone Number: ' . $phoneNumber . '<br><br>';
    }
    $body .= 'Message: ' . $message . '<br><br>';

    /* Subject */

    $subject_mail = "Important: New Message";

    /* PHPMailer Settings */

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    // Set PHPMailer to use the sendmail transport
    $mail->isSendmail();
    //Set who the message is to be sent from
    $mail->setFrom($email, $firstName);
    //Set an alternative reply-to address
    $mail->addReplyTo($email, $firstName);
    //Set who the message is to be sent to
    $mail->addAddress('contact@dushyantpatel.me', 'Dushyant Patel');
    $mail->Subject = $subject_mail;
    $mail->Body = $body;

//    //send the message, check for errors
//    if (!$mail->send()) {
//        $success= "Mailer Error: " . $mail->ErrorInfo;
//    } else {
//        $success = "Message sent!";
//    }

    if ($mail->Send()) {
        $response_array['status'] = 'success';
    }else {
        $response_array['status'] = 'error';
    }
    echo json_encode($response_array);
}

?>