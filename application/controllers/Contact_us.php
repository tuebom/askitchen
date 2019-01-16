<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

		$this->load->helper('captcha');

		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
/*
THIS FILE USES PHPMAILER INSTEAD OF THE PHP MAIL() FUNCTION
*/

require 'PHPMailer-master/PHPMailerAutoload.php';

/*
*  CONFIGURE EVERYTHING HERE
*/

// an email address that will be in the From field of the email.
$fromEmail = 'marketing@askitchen.com';
$fromName = 'webadmin';

// an email address that will receive the email with the output of the form
$sendToEmail = 'marketing@askitchen.com';
$sendToName = 'marketing';

// subject of the email
$subject = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message');

// message that will be displayed when everything is OK :)
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';
		$(function () {

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    $('#contact-form').validator();


    // when the form is submitted
    $('#contact-form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $('#contact-form').find('.messages').html(alertBox);
                        // empty the form
                        $('#contact-form')[0].reset();
                    }
                }
            });
            return false;
        }
    })
});
		
		// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
		error_reporting(0);
		
		try
		{
		
			if(count($_POST) == 0) throw new \Exception('Form is empty');
					
			$emailText = "You have a new message from your contact form\n=============================\n";
		
			foreach ($_POST as $key => $value) {
				// If the field exists in the $fields array, include it in the email 
				if (isset($fields[$key])) {
					$emailText .= "$fields[$key]: $value\n";

		if ($action) {

			if ($action == 'add') {

				$this->form_validation->set_rules('name', 'First Name', 'required');
				$this->form_validation->set_rules('surname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('need', 'Comment', 'required');
				$this->form_validation->set_rules('message', 'Comment', 'required');

				if ($this->form_validation->run() == TRUE)
				{
					$data = array(
						"first_name"  => $this->input->post('name'),
						"last_name"   => $this->input->post('surname'),
						"email"       => $this->input->post('email'),
						"need"        => $this->input->post('need'),
						"message"     => $this->input->post('message')
					);
					
					$captcha  = $this->input->post('captcha');
					$url 	  = $this->input->post('url');

					if ($captcha == $this->session->userdata('captcha'))
					{
						// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
						// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);

						if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
							$file = 'D:\xampp\htdocs\askitchen\images\captcha\\';
						} else {
							$file = './captcha/';
						}
						if (file_exists($file . $this->session->userdata['image']))
							unlink($file . $this->session->userdata['image']);
			
						$this->session->unset_userdata('captcha');
						$this->session->unset_userdata('image');

						$this->reviews_model->insert($data);
						header("location: ".$url);
					}
					else
					{

						// $this->session->set_flashdata('message', 'Kode yang Anda masukkan tidak cocok.');
						$this->data['first_name'] = $this->input->post('name');
						$this->data['last_name']  = $this->input->post('surname');
						$this->data['email']      = $this->input->post('email');
						$this->data['need']       = $this->input->post('need');
						$this->data['message']    = $this->input->post('message');
					}
				}
				else
				{
					$this->data['error_message'] = (validation_errors()) ? validation_errors() : '';
				}
			}
		
			// All the neccessary headers for the email.
			$headers = array('Content-Type: text/plain; charset="UTF-8";',
				'From: ' . $from,
				'Reply-To: ' . $from,
				'Return-Path: ' . $from,
			);
			
			// Send email
			mail($sendTo, $subject, $emailText, implode("\n", $headers));
		
			$responseArray = array('type' => 'success', 'message' => $okMessage);
		}
		catch (\Exception $e)
		{
			$responseArray = array('type' => 'danger', 'message' => $errorMessage);
		}
		
		
		// if requested by AJAX request return JSON response
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$encoded = json_encode($responseArray);
		
			header('Content-Type: application/json');
		
			echo $encoded;
		}
		// else just display the message
		else {
			echo $responseArray['message'];
		}
		// $action  = $this->input->get('action');
		
		// if ($action) {

		// 	if ($action == 'add') {

		// 		$this->form_validation->set_rules('name', 'Name', 'required');
		// 		$this->form_validation->set_rules('email', 'Email', 'required');
		// 		$this->form_validation->set_rules('comment', 'Comment', 'required');

		// 		if ($this->form_validation->run() == TRUE)
		// 		{
		// 			$data = array(
		// 				"kdbar"    => $this->input->post('kdbar'),
		// 				"name"     => $this->input->post('name'),
		// 				"email"    => $this->input->post('email'),
		// 				"comment"  => $this->input->post('comment'),
		// 				"rating"   => $this->input->post('rating')
		// 			);
					
		// 			$captcha  = $this->input->post('captcha');
		// 			$url 	  = $this->input->post('url');

		// 			if ($captcha == $this->session->userdata('captcha'))
		// 			{
		// 				// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
		// 				// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);

		// 				if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		// 					$file = 'D:\xampp\htdocs\askitchen\images\captcha\\';
		// 				} else {
		// 					$file = './captcha/';
		// 				}
		// 				if (file_exists($file . $this->session->userdata['image']))
		// 					unlink($file . $this->session->userdata['image']);
			
		// 				$this->session->unset_userdata('captcha');
		// 				$this->session->unset_userdata('image');

		// 				$this->reviews_model->insert($data);
		// 				header("location: ".$url);
		// 			}
		// 			else
		// 			{

		// 				// $this->session->set_flashdata('message', 'Kode yang Anda masukkan tidak cocok.');
		// 				$this->data['name']    = $this->input->post('name');
		// 				$this->data['email']   = $this->input->post('email');
		// 				$this->data['comment'] = $this->input->post('comment');
		// 				$this->data['rating']  = $this->input->post('rating');
		// 				$this->data['message'] = 'Kode yang Anda masukkan tidak cocok.';
		// 			}
		// 		}
		// 		else
		// 		{
		// 			$this->data['message'] = (validation_errors()) ? validation_errors() : '';
		// 		}

        //     }
		// }
		
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

		$this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
		
		$this->load->view('layout/header', $this->data);
		$this->load->view('contact/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
