<?php
set_include_path(get_include_path()."/PHPMailer-master/src");

include "SMTP.php";
include "Exception.php";
include "PHPMailer.php";

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['feedback'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'testotrs9@gmail.com';
        $mail->Password = 'myotrspw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($email);
        $mail->addAddress('sadafsuhail003@gmail.com', 'Me');
        $mail->Subject = $message;

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;

        //echo $body;
        if($mail->send()){

            header('Location: contact.php?successmessage="Thank You for your feedback"'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
 		     header('Location: contact.php?errorMessage=$errorMessage');
        }
    }
}

?>

