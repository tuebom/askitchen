<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		unset($_SESSION["cart_item"]);
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
		$this->data['reviews'] = $this->stock_model->get_reviews($kode);

		$this->load->view('layout/header', $this->data);
		$this->load->view('detail/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
