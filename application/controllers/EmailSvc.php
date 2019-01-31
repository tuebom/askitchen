<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
class Emailsvc extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library("phpmailer_library");
    }
 
    function contact_us(){

        $name = $this->input->post('name') . ' ' . $this->input->post('surname');
        $toEmail = $this->input->post('emailto');
        $toEmailSender = $this->input->post('email');

        // subject of the email
        $subject = 'New message from '.$name;
            
        $emailText = "You have a new message from your contact form <br>";

        // array variable name => Text to appear in the email
        $fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'need' => 'Need', 'email' => 'Email', 'message' => 'Message');

        foreach ($_POST as $key => $value) {
            // If the field exists in the $fields array, include it in the email 
            if (isset($fields[$key])) {
                $emailText .= "$fields[$key]: $value<br>";
            }
        }
        
        $fromEmail = "webmaster@askitchen.com";
        // $isiEmail = "Isi email tulis disini";

        $mail = $this->phpmailer_library->load(); //new PHPMailer();
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
        $mail->Body       = $emailText;
        // $toEmail = "aswin@askitchen.com"; // siapa yg menerima email ini
        // $toEmail = "marketing@askitchen.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
        $mail->AddAddress($toEmailSender);
       
        if(!$mail->Send()) {
            // echo "Error: ".$mail->ErrorInfo;
            $responseArray = array('type' => 'danger', 'message' => $errorMessage);
            // return FALSE;
        } else {
            // echo "Email berhasil dikirim";
            $responseArray = array('type' => 'success', 'message' => 'Submitted the form successfully!');
            // return TRUE;
        }
        echo json_encode($responseArray);
    }
     
    function mail_order(){

        $mbr_name  = $this->input->post('first_name') . ' ' . $this->input->post('last_name');

        $fromEmail = "webmaster@askitchen.com";
        $toEmail   = 'marketing@askitchen.com';

        // subject of the email
        $subject = 'New order from '. $mbr_name;
            
        // $emailText = "You have a new message from your contact form <br>";
        
        $emailText  = '<div>'; // style="width:50%;"
        $emailText .= '    <h2>Order #'.$_SESSION["order_id"].'</h2>';
        $emailText .= '    <table class="table table table-striped">';
        $emailText .= '        <thead>';
        $emailText .= '            <tr>';
        $emailText .= '                <th>Item Code</th><th>Description</th><th style="text-align:right;">Qty</th>';
        $emailText .= '                <th style="text-align:right;">Total</th>';
        $emailText .= '            </tr>';
        $emailText .= '        </thead>';
        $emailText .= '        <tbody>';
                        
        $item_price  = 0;
        $total_price = 0;

                        foreach ($_SESSION["cart_item"] as $item) {

                            $item_price  = (float)$item["qty"]*$item["harga"];
                            $total_price += $item_price;

        $emailText .= '            <tr>';
        $emailText .= '                <td>'. $item["kdbar"] .'</td>';
        $emailText .= '                <td>'. $item["nama"] .'</td>';
        $emailText .= '                <td style="text-align:right;">'. $item["qty"] .'</td>';
        $emailText .= '                <td style="text-align:right;">Rp'. number_format($item_price, 0, '.', ',') .'</td>';
        $emailText .= '            </tr>';
                        }
        $emailText .= '        </tbody>';
        $emailText .= '        <tfoot>';
        $emailText .= '            <tr>';
        $emailText .= '                <td><b>Subtotal</b></td>';
        $emailText .= '                <td style="text-align:right;"><b>Rp'. number_format($total_price, 0, '.', ',') .'</b></td>';
        $emailText .= '            </tr>';
        $emailText .= '            <tr>';
        $emailText .= '                <td><b>Shipping</b></td>';
        $emailText .= '                <td style="text-align:right;"><b>0</b></td>';
        $emailText .= '            </tr>';
        $emailText .= '            <tr>';
        $emailText .= '                <td><b>Tax</b></td>';
        $emailText .= '                <td style="text-align:right;"><b>0</b></td>';
        $emailText .= '            </tr>';
        $emailText .= '            <tr>';
        $emailText .= '                <td><b>Total</b></td>';
        $emailText .= '                <td style="text-align:right;"><b>Rp'. number_format($total_price, 0, '.', ',') .'</b></td>';
        $emailText .= '            </tr>';
        $emailText .= '        </tfoot>';
        $emailText .= '    </table>';
        $emailText .= '</div>';

        $array_items = array('first_name', 'last_name', 'company', 'address',
        'province', 'regency', 'district', 'post_code', 'phone', 'email', 'guest');
        $this->session->unset_userdata($array_items);
        
        // array variable name => Text to appear in the email
        // $fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'need' => 'Need', 'email' => 'Email', 'message' => 'Message');

        // foreach ($_POST as $key => $value) {
        //     // If the field exists in the $fields array, include it in the email 
        //     if (isset($fields[$key])) {
        //         $emailText .= "$fields[$key]: $value<br>";
        //     }
        // }

        $mail = $this->phpmailer_library->load(); //new PHPMailer();
        $mail->IsHTML(true);                       // set email format to HTML
        $mail->IsSMTP();                           // we are going to use SMTP
        $mail->SMTPAuth   = true;                  // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";                 // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $fromEmail;            // alamat email kamu
        $mail->Password   = "jimmyfallon5757";     // password GMail
        $mail->SetFrom('webmaster@askitchen.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = $subject;
        $mail->Body       = $emailText;
        // $toEmail = "aswin@askitchen.com";     // siapa yg menerima email ini
        // $toEmail = "marketing@askitchen.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
        
        if(!$mail->Send()) {
            // echo "Error: ".$mail->ErrorInfo;
            $responseArray = array('type' => 'danger', 'message' => $errorMessage);
            // return FALSE;
        } else {
            // echo "Email berhasil dikirim";
            $responseArray = array('type' => 'success', 'message' => 'Submitted the form successfully!');
            // return TRUE;
        }
        echo json_encode($responseArray);
    }
}
?>