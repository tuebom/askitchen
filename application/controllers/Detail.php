<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		$this->load->model('reviews_model');
		// unset($_SESSION["cart_item"]);
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        // $kdgol = $this->uri->segment(2);
        $kode = $this->uri->segment(2);
		
		$this->data['product'] = $this->stock_model->get_by_kodeurl($kode);
		$this->data['related'] = $this->stock_model->get_related($this->data['product']->kdgol2, $kode);

		$action  = $this->input->get('action');
		
		if ($action) {

			$data = array(
				"kdbar"    => $this->input->post('kdbar'),
				"name"     => $this->input->post('name'),
				"email"    => $this->input->post('email'),
				"comment"  => $this->input->post('comment')
				);
			
			$url = $this->input->post('url');
		
			$this->reviews_model->insert($data);
			header("location: ".$url);
		}
		
		$this->data['reviews'] = $this->reviews_model->get_limit_data(3,0,$kode);
		$this->data['totreviews'] = $this->reviews_model->total_rows($kode);

		$this->load->view('layout/header', $this->data);
		$this->load->view('detail/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
