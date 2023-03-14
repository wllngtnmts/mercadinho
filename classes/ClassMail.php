<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ClassMail{

    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
    }

    public function sendMail($email, $nome, $token=null, $assunto, $corpoEmail)
    {
        try {
            //Server settings
            $this->mail->isSMTP();                                            // Send using SMTP
            //$this->mail->SMTPDebug = 1;
            $this->mail->Host       = HOSTMAIL;                    // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = USERMAIL;                     // SMTP username
            $this->mail->Password   = PASSMAIL;
            $this->mail->SMTPAutoTLS= false;                        //$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                                                              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->mail->Port       = 587;                                    // TCP port to connect to }
            $this->mail->CharSet='utf-8';
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $this->mail->setFrom('suporte@sistemasesoftware.com.br', 'Engenharia de Software');
            $this->mail->addAddress($email, $nome);     // Add a recipient

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $assunto;
            $this->mail->Body    = $corpoEmail;

            $this->mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}

