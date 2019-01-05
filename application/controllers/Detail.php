<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

		$this->load->helper('captcha');

		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		$this->load->model('reviews_model');
		
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        $kode = $this->uri->segment(2);
		
		$this->data['product'] = $this->stock_model->get_by_kodeurl($kode);
		$this->data['related'] = $this->stock_model->get_related($this->data['product']->kdgol2, $kode);

		$action  = $this->input->get('action');
		
		if ($action) {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('comment', 'Comment', 'required');

            if ($this->form_validation->run() == TRUE)
            {
				$data = array(
					"kdbar"    => $this->input->post('kdbar'),
					"name"     => $this->input->post('name'),
					"email"    => $this->input->post('email'),
					"comment"  => $this->input->post('comment')
				);
				
				$captcha  = $this->input->post('captcha');
				$url 	  = $this->input->post('url');

				if ($captcha == $this->session->userdata('captcha'))
				{
					// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
					// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);
					if (file_exists('C:\xampp\htdocs\askitchen\images\captcha\\' . $this->session->userdata['image']))
						unlink('C:\xampp\htdocs\askitchen\images\captcha\\' . $this->session->userdata['image']);
		
					$this->session->unset_userdata('captcha');
					$this->session->unset_userdata('image');

					$this->reviews_model->insert($data);
					header("location: ".$url);
				}
				else
				{

					// $this->session->set_flashdata('message', 'Kode yang Anda masukkan tidak cocok.');
					$this->data['name']    = $this->input->post('name');
					$this->data['email']   = $this->input->post('email');
					$this->data['comment'] = $this->input->post('comment');
					$this->data['message'] = 'Kode yang Anda masukkan tidak cocok.';
				}
			}
			else
			{
				$this->data['message'] = (validation_errors()) ? validation_errors() : '';
			}
		}
		
		// prepare captcha
		$original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

		$original_string = implode("", $original_string);

		$captcha = substr(str_shuffle($original_string), 0, 6);
		
		$vals = array(

			'word' => $captcha,

			'img_path' => 'C:\xampp\htdocs\askitchen\images\captcha',

			'img_url' => base_url('images/captcha'),

			'font_size' => 10,

			'img_width' => 150,

			'img_height' => 50,

			'expiration' => 7200

		);

		$cap = create_captcha($vals);

		// $this->data['cap'] = $cap;
		// $this->data['image'] = $cap['image'];
		// $this->data['file_path'] = BASEPATH . "../captcha/"; //. $this->session->userdata['image'];

		// if (file_exists(BASEPATH . "../captcha/" . $this->session->userdata['image']))
		// unlink(BASEPATH . "../captcha/" . $this->session->userdata['image']);

		if (file_exists("C:\xampp\htdocs\askitchen\images\captcha\\" . $this->session->userdata['image']))
			unlink("C:\xampp\htdocs\askitchen\images\captcha\\" . $this->session->userdata['image']);


		$this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
		
		$this->data['reviews']    = $this->reviews_model->get_limit_data(3,0,$kode);
		$this->data['totreviews'] = $this->reviews_model->total_rows($kode);

		$this->load->view('layout/header', $this->data);
		$this->load->view('detail/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
