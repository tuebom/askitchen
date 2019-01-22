<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
class MyEmail extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('MyPHPMailer'); // load library
    }
 
    function emailSend($subject, $isiEmail){

        $fromEmail = "webmaster@askitchen.com";
        // $isiEmail = "Isi email tulis disini";

        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $fromEmail;  // alamat email kamu
        $mail->Password   = "jimmyfallon5757";            // password GMail
        $mail->SetFrom('webmaster@askitchen.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = $subject;
        $mail->Body       = $isiEmail;
        // $toEmail = "aswin@askitchen.com"; // siapa yg menerima email ini
        $toEmail = "rokmeowildan@gmail.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
       
        if(!$mail->Send()) {
            // echo "Eror: ".$mail->ErrorInfo;
            return FALSE;
        } else {
            // echo "Email berhasil dikirim";
            return TRUE;
        }
    }
}
?>