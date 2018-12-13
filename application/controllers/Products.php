<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
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
        
        $kode = $this->uri->segment(2);
		
		if (strlen($kode) == 2) {
			$this->data['title'] = $this->golongan_model->get_by_id($kode)->nama;
		} else {
			$this->data['title'] = $this->golongan_model->get_by_subid($kode)->nama;
		}
		$this->data['products'] = $this->stock_model->get_by_category(12, 0, $kode);
		$this->data['price_range'] = $this->stock_model->get_price_range($kode);
		$this->data['kode'] = $kode;

		$this->load->view('layout/header', $this->data);
		$this->load->view('products/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	
	public function brands()
	{
		// $this->load->view('public/home', $this->data);
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        $kode = $this->uri->segment(2);
        $brand = $this->uri->segment(3);
		
		$this->data['products'] = $this->stock_model->get_by_brand(12, 0, $kode, $brand);

		$this->load->view('layout/header', $this->data);
		$this->load->view('products/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
