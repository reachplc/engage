<?php

header('Access-Control-Allow-Origin: *');

define("PATH", "/dev/engage/api/subscribe");
define("HOME", $_SERVER['DOCUMENT_ROOT'] . PATH);

# Include settings
include HOME . '/config.php';

require 'PHPMailerAutoload.php';

/**
 * Setup Smarty template language
 */

include HOME . '/smarty/Smarty.class.php';

/**
 * Empty array to store data once sorted
 */
$data;

function errorMessage( $msg ) {

  $date = date('Y-m-d h:i:s');
  $log = $date . "   |   ". $msg . "\n";

  error_log($log, 3, LOG_FILE);

}

# Manage data supplied



function submitEmail( $_data ) {

  global $config;
  // Build Email
  $mail = new PHPMailer;

  // Set mailer to use SMTP
  $mail->isSMTP();
  // Specify main and backup SMTP servers
  $mail->Host = $config['email']['host'];
  // Enable SMTP authentication
  $mail->SMTPAuth = true;
  // SMTP username
  $mail->Username = $config['email']['username'];
  // SMTP password
  $mail->Password = $config['email']['password'];
  // Enable TLS encryption, `ssl` also accepted
  $mail->SMTPSecure = 'tls';
  // TCP port to connect to
  $mail->Port = $config['email']['port'];

  /**
   * Render email template using Smarty
   */

  /*$message = "Full name: " . $_data['name'] . "\n\n";
  $message .= "Company: " . $_data['q1'] . "\n\n";
  $message .= "Have you used us before: " .  $_data['q2'] . "\n\n";
  $message .= "Email:  " .  $_data['email'] . "\n\n";
  $message .= "Section you work in:  " .  $_data['q4'] . "\n\n";
  $message .= "Phone Number:  " .  $_data['q5'] . "\n\n";
  $message .= "Area:  " .  $_data['q6'] . "\n\n";*/

  $smarty = new Smarty;

  $smarty->assign( 'name', $_data['name'] );
  $smarty->assign( 'q1', $_data['q1'] );
  $smarty->assign( 'q2', $_data['q2'] );
  $smarty->assign( 'q3', $_data['email'] );
  $smarty->assign( 'q4', $_data['q4'] );
  $smarty->assign( 'q5', $_data['q5'] );
  $smarty->assign( 'q6', $_data['q6'] );

  $message = $smarty->fetch( HOME . '/templates/email/content.tpl' );

/**
 * Build email
 */


  # Email Template



  $mail->addAddress( 'engage@trinitymirror.com' );
  $mail->From = $_data['email'];
  $mail->FromName = $_data['name'];
  $mail->addBCC( $config['email']['webmaster'] );
  $mail->addReplyTo('no.reply@icpublishing.co.uk');

  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = "Engage - " . $_data['name'];
  $mail->Body    = $message;
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if( !$mail->send() ) {
    if( DEBUG ) {
      $error = 'Mailer Error: ' . $mail->ErrorInfo;
      errorMessage( $error );
    }
    return false;
  } else {
    return true;
  }



}


function confirmationEmail( $_data ) {

global $config;
  // Build Email
   $mail = new PHPMailer;

   // Set mailer to use SMTP
 $mail->isSMTP();
 // Specify main and backup SMTP servers
 $mail->Host = $config['email']['host'];
 // Enable SMTP authentication
 $mail->SMTPAuth = true;
 // SMTP username
  $mail->Username = $config['email']['username'];
 // SMTP password
 $mail->Password = $config['email']['password'];
 // Enable TLS encryption, `ssl` also accepted
 $mail->SMTPSecure = 'tls';
 // TCP port to connect to
 $mail->Port = $config['email']['port'];

  /**
   * Render email template using Smarty
   */

  /*$message    = "Hi,<br><br>" ;
  $message   .= "Thank you for subscribing to Enagage.<br>";
  $message   .= "We have added your details to our database and will contact you shortly.<br>";
  $message   .= "<br>";
  $message   .= "Thanks,<br>";
  $message   .= "The Trinity Mirror Engage Recruitment Team<br><br>";*/

  $smarty = new Smarty;
  //$smarty->assign('name', 'george smith');
  $message = $smarty->fetch( HOME . '/templates/email/confirmation.tpl' );

/**
 * Build email
 */

  $mail->From = 'no.reply@icpublishing.co.uk';
  $mail->FromName = 'Engage Recruitment';
  $mail->addReplyTo('no.reply@icpublishing.co.uk', 'Engage Recruitment');

  $mail->addAddress( $_data['email'] );               // Name is optional

  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = "Engage Confirmation";
  $mail->Body    = $message;
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if( !$mail->send() ) {
    errorMessage( $mail->ErrorInfo );
    return false;
  } else {
    return true;
  }

}

//  Check if form submitted
if (!isset($_POST['SubmitEngage'])) {
  # Redirect the user to the form to fill in
  header('X-PHP-Response-Code: 500', true, 500);
    echo "Oops! Something went wrong, please fill in form and try again!";
} else {

      if( submitEmail($_POST) ) {

        if( confirmationEmail($_POST) ) {
          # Success
           header('X-PHP-Response-Code: 200', true, 200);
            echo "Thank You! Your message has been sent.";
        } else {
          # Confirmation Email Failed
          if( DEBUG ) {
            $error = "Confirm Email Error";
            errorMessage( $error );
          }
          header('X-PHP-Response-Code: 500', true, 500);
            echo "Oops! Something went wrong, please fill in form and try again.";
        }

      } else {
        # SubmitEmail Failed
        if( DEBUG ) {
          $error = "Submit Email Error";
          errorMessage( $error );
        }
        header('X-PHP-Response-Code: 403', true, 403);
        echo "There was a problem with your submission, please try again.";
      }
}
