 <?php


// configure
$from = 'Demo contact form <demo@domain.com>';
$sendTo = 'Demo contact form <benhalima.sadda@gmail.com>';
$subject = 'New message from contact form';
$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' =>
'Email', 'message' => 'Message'); // array variable name => Text to appear in email
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you
soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';
// let's do the sending
try
{
 $emailText = "You have new message from contact
form\n=============================\n";
 foreach ($_POST as $key => $value) {
 if (isset($fields[$key])) {
 $emailText .= "$fields[$key]: $value\n";
 }
 }
 mail($sendTo, $subject, $emailText, "From: " . $from);
 $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
 $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
 $encoded = json_encode($responseArray);

 header('Content-Type: application/json');

 echo $encoded;
}
else {
 echo $responseArray['message'];
}
 

   // $to = "sadda.benhalima@gmail.com";
    //$from = $_REQUEST['email'];
	//$name = $_REQUEST['name'];
	//$cmessage = $_REQUEST['message'];
    //$subject = $_REQUEST['subject'];
    //$number = $_REQUEST['number'];
    

    //$headers = "From: $from";
	//$headers = "From: " . $from . "\r\n";
	//$headers .= "Reply-To: ". $from . "\r\n";
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // $subject = "You have a message from your Bitmap Photography.";

    // $logo = 'img/logo.png';
    // $link = '#';

	// $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	// $body .= "<table style='width: 100%;'>";
	// $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	// $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	// $body .= "</td></tr></thead><tbody><tr>";
	// $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	// $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	// $body .= "</tr>";
	// $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	// $body .= "<tr><td></td></tr>";
	// $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	// $body .= "</tbody></table>";
	// $body .= "</body></html>";

    // $send = mail($to, $subject, $body, $headers);

?> 