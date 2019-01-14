<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter'), $this->config->item('error_end_delimiter'));
		
		$this->lang->load('checkout');
		
		$this->load->model('golongan_model');
		$this->load->model('provinsi_model');
		$this->load->model('kabupaten_model');
		$this->load->model('kecamatan_model');
		$this->load->model('member_model');
		// $this->output->enable_profiler(TRUE);
    }

	public function index()
	{
		
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		$this->data['provinsi'] = $this->provinsi_model->get_all();
		
		if ( $this->ion_auth->logged_in())
        {
			// siapkan data member
			$this->data['anggota'] = $this->ion_auth->user()->row();
        }
            
        $submit = $this->input->post('submit');

        if ($submit) {
			die('submited!');

            /* Validate form input */
            $this->form_validation->set_rules('first_name', 'lang:checkout_firstname', 'required');
            $this->form_validation->set_rules('last_name', 'lang:checkout_lastname', 'required');
			$this->form_validation->set_rules('email', 'lang:checkout_email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'lang:checkout_phone', 'required|valid_email');
			
			$this->form_validation->set_rules('province', 'lang:checkout_province', 'required');
			$this->form_validation->set_rules('regency', 'lang:checkout_regency', 'required');
			$this->form_validation->set_rules('district', 'lang:checkout_district', 'required');
			
			$this->form_validation->set_rules('province', 'lang:checkout_post_code', 'required');
			$this->form_validation->set_rules('regency', 'lang:checkout_address1', 'required');
			// $this->form_validation->set_rules('district', 'lang:checkout_district', 'required');
			
			if ($this->form_validation->run() == TRUE)
            {
                $first_name = $this->input->post('first_name');
                $last_name  = $this->input->post('last_name');
                $company    = $this->input->post('company');
				$email      = strtolower($this->input->post('email'));
				$phone      = $this->input->post('phone');
				
				// shipping address data
				$province   = $this->input->post('province');
				$regency    = $this->input->post('regency');
				$district   = $this->input->post('district');
			}
			else
			{
				$this->data['message'] = (validation_errors() ? validation_errors() : 'Input data belum benar!');
			}
		}

		$this->load->view('layout/header', $this->data);
		$this->load->view('checkout/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function regencies()
	{
		$provid = $this->uri->segment(3);
		// $provid = $this->input->post("id");
		$data = $this->kabupaten_model->search($provid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}

	public function districts()
	{
		$kbpid = $this->uri->segment(3);
		// $provid = $this->input->post("id");
		$data = $this->kecamatan_model->search($kbpid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}
}
