<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
	}

	
	public function index()
	{
		// $this->load->view('public/home', $this->data);
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		$data = $this->input->get('q'); //$this->get('q');

        $this->data['q'] = $data;
		$this->data['products'] = $this->stock_model->get_limit_data(12,0,$data);
		$this->data['price_range'] = $this->stock_model->get_global_price_range();

		$this->load->view('layout/header', $this->data);
		$this->load->view('search/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
