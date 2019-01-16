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

		$action  = $this->input->get('action');
		
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
		}
		
		// prepare captcha
		$original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

		$original_string = implode("", $original_string);

		$captcha = substr(str_shuffle($original_string), 0, 6);
		
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			$file = 'D:\xampp\htdocs\askitchen\images\captcha\\';
		} else {
			$file = './captcha/';
		}

		$vals = array(

			'word' => $captcha,

			'img_path' => $file, //'D:\xampp\htdocs\askitchen\images\captcha\\', //'./captcha'

			'img_url' => base_url('images/captcha'),

			'font_size' => 10,

			'img_width' => 150,

			'img_height' => 50,

			'expiration' => 7200

		);

		// note: pastikan folder captcha sudah dibuat
		$cap = create_captcha($vals);

		// $this->data['cap'] = $cap;
		// $this->data['image'] = $cap['image'];
		// $this->data['file_path'] = BASEPATH . "../captcha/"; //. $this->session->userdata['image'];

		if (isset($this->session->userdata['image'])) {
			// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
			// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);

			if (file_exists($file . $this->session->userdata['image']))
				unlink($file . $this->session->userdata['image']);
		}

		$this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
		
		$this->load->view('layout/header', $this->data);
		$this->load->view('contact/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
