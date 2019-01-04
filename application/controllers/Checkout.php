<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
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
		// $this->load->view('public/home', $this->data);
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
