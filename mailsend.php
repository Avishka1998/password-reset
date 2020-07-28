<?php
    // require 'vendor/autoload.php';

    // class sendEmail{
    //     public static function sendMail($to,$subject,$content){
    //         $key='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';
    //         $email=new \sendGrid\Mail\Mail();
    //         $email->setFrom("sandeeparanatungavcg@gmail.com","Sandeepa Ranathunga");
    //         $email->setSubject($subject);
    //         $email->addTo($to);
    //         $email->addContent("text/plain",$content);

    //         $sendgrid=new \SendGrid($key);

    //         $response=$sendgrid->send($email);
    //         if($response)
    //             echo 'Mail sent sucessfully';
    //         else
    //             echo 'Something went wrong';

    //     }
    // }
?>

<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail();
$email->setFrom("sandeeparanatungavcg@gmail.com", "Sandeepa Ranathunga");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("sandeeparanatunga@yahoo.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid("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");
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>