<?php //got this from a tutorial at: http://www.html-form-guide.com/email-form/php-form-to-email.html
if(!isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['message']))
{
  //This page should not be accessed directly. Need to submit the form.
  echo "error; you need to submit the form!";
}
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$visitor_email = $_POST['email'];
$visitor_phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Validate first
if(empty($first_name)||empty($visitor_email)||empty($message))
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'gpmaitl@gmail.com';
$email_subject = "$subject";
$email_body = "You have received a new message from the user $first_name.\n".
    "Here is the message:\n $message \n\n"."Phone: $visitor_phone";

$to = "gpmaitl@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thankyou.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>

