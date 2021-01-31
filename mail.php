// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'mailer/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();


//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
$mail->isSMTP(); // Send using SMTP
$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'salahtaha741@gmail.com'; // SMTP username
$mail->Password = 'Taha11@@Hala'; // SMTP password
$mail->SMTPSecure = "ssl"; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port = 465;
$msg->

// Content
$mail->isHTML(true);
$mail->CharSet = "UTF-8";


if (isset($_POST['send'])) {
require_once 'mail.php';
$mail->setFrom('hammar084@gmail.com', 'Mailer');
$mail->addAddress('salahtaha741@gmail.com');
$mail->send();
}