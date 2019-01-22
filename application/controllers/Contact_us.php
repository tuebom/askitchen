<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

		$this->load->helper('captcha');
		$this->load->library('MyPHPMailer'); // load library

		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{

		// $this->load->library("phpmailer_library");
		// $objMail = $this->phpmailer_library->load();
		

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		/*
		*  CONFIGURE EVERYTHING HERE
		*/

		// an email address that will be in the From field of the email.
		$fromEmail = 'webmaster@askitchen.com';
		$fromName = 'webadmin';

		// an email address that will receive the email with the output of the form
		$sendToEmail = 'aswin@askitchen.com';
		$sendToName = 'marketing';

		$name = $this->input->post('name') . ' ' . $this->input->post('surname');

		// subject of the email
		$subject = 'New message from '.$name;

		// form field names and their translations.
		// array variable name => Text to appear in the email
		$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'need' => 'Need', 'email' => 'Email', 'message' => 'Message');

		// message that will be displayed when everything is OK :)
		$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

		// If something goes wrong, we will display this message.
		$errorMessage = 'There was an error while submitting the form. Please try again later';

		
		// validasi input
		$this->form_validation->set_rules('name', 'First Name', 'required');
		$this->form_validation->set_rules('surname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('need', 'Need', 'required');
		$this->form_validation->set_rules('message', 'Comment', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			
			$emailText = "You have a new message from your contact form <br>";

			foreach ($_POST as $key => $value) {
				// If the field exists in the $fields array, include it in the email 
				if (isset($fields[$key])) {
					$emailText .= "$fields[$key]: $value<br>";
				}
			}
			
			$this->load->library('../controllers/MyEmail');
			
			if ($this->myemail->emailSend($subject, $emailText)) {
				redirect('/', 'refresh');
			}
	
			// Send email
			// $mail = new PHPMailer();
			// $mail->IsSMTP(); // enable SMTP
			// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			// $mail->SMTPAuth = true; // authentication enabled
			// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			// $mail->Host = "smtp.gmail.com";
			// $mail->Port = 465; // or 587
			// $mail->IsHTML(true);
			// $mail->Username = "webmaster@askitchen.com";
			// $mail->Password = "jimmyfallon5757";
			// $mail->SetFrom("webmaster@askitchen.com");
			// $mail->Subject = $subject;
			// $mail->Body = $emailText;
			// $mail->AddAddress("aswin@askitchen.com");


			// try {
				
			// 	if(!$mail->send()) {
			// 		throw new \Exception('I could not send the email.' . $mail->ErrorInfo);
			// 	}
				
			// 	$responseArray = array('type' => 'success', 'message' => $okMessage);
			// } catch (\Exception $e) {
			// 	// $responseArray = array('type' => 'danger', 'message' => $errorMessage);
			// 	$responseArray = array('type' => 'danger', 'message' => $e->getMessage());
			// }

			// if requested by AJAX request return JSON response
			if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
				$encoded = json_encode($responseArray);
				
				// return $this->output
				// ->set_content_type('application/json')
				// ->set_status_header(200)
				// ->set_output($encoded);
						
				header('Content-Type: application/json');
				echo $encoded;
			}
			// else just display the message
			else {
				$this->data['message'] = $okMessage;
			}
			
		
			// redirect('/', 'refresh'); // raise error
 			// echo '<script type="text/javascript">window.location = ". site_url() . ";</script>';
 			// return;
			
			// $captcha  = $this->input->post('captcha');
			// $url 	  = $this->input->post('url');

			// if ($captcha == $this->session->userdata('captcha'))
			// {
			// 	// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
			// 	// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);

			// 	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			// 		$file = 'D:\xampp\htdocs\askitchen\images\captcha\\';
			// 	} else {
			// 		$file = './captcha/';
			// 	}
			// 	if (file_exists($file . $this->session->userdata['image']))
			// 		unlink($file . $this->session->userdata['image']);
	
			// 	$this->session->unset_userdata('captcha');
			// 	$this->session->unset_userdata('image');

			// 	$this->reviews_model->insert($data);
			// 	header("location: ".$url);
			// }
			// else
			// {

			// 	// $this->session->set_flashdata('message', 'Kode yang Anda masukkan tidak cocok.');
			// 	$this->data['first_name'] = $this->input->post('name');
			// 	$this->data['last_name']  = $this->input->post('surname');
			// 	$this->data['email']      = $this->input->post('email');
			// 	$this->data['need']       = $this->input->post('need');
			// 	$this->data['message']    = $this->input->post('message');
			// }
		    
		}
		else
		{
			$this->data['error_message'] = (validation_errors()) ? validation_errors() : '';
		}
		
		
		// // prepare captcha
		// $original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

		// $original_string = implode("", $original_string);

		// $captcha = substr(str_shuffle($original_string), 0, 6);
		
		// if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		// 	$file = 'D:\xampp\htdocs\askitchen\images\captcha\\';
		// } else {
		// 	$file = './captcha/';
		// }

		// $vals = array(

		// 	'word' => $captcha,

		// 	'img_path' => $file, //'D:\xampp\htdocs\askitchen\images\captcha\\', //'./captcha'

		// 	'img_url' => base_url('images/captcha'),

		// 	'font_size' => 10,

		// 	'img_width' => 150,

		// 	'img_height' => 50,

		// 	'expiration' => 7200

		// );

		// // note: pastikan folder captcha sudah dibuat
		// $cap = create_captcha($vals);

		// // $this->data['cap'] = $cap;
		// // $this->data['image'] = $cap['image'];
		// // $this->data['file_path'] = BASEPATH . "../captcha/"; //. $this->session->userdata['image'];

		// if (isset($this->session->userdata['image'])) {
		// 	// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
		// 	// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);

		// 	if (file_exists($file . $this->session->userdata['image']))
		// 		unlink($file . $this->session->userdata['image']);
		// }

		// $this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
		
		$this->load->view('layout/header', $this->data);
		$this->load->view('contact/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
