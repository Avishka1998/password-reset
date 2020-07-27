<?php
    require 'vendor/autoload.php';

    class sendEmail{
        public static function sendMail($to,$subject,$content){
            $key='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';
            $email=new \sendGrid\Mail\Mail();
            $email->setFrom("sandeeparanatungavcg@gmail.com","Sandeepa Ranathunga");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);

            $sendgrid=new \SendGrid($key);

            $response=$sendgrid->send($email);
            if($response)
                echo 'Mail sent sucessfully';
            else
                echo 'Something went wrong';

        }
    }
?>