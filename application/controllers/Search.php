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
		
		$data = $this->input->post('q'); //$this->get('q');
        $this->data['products'] = $this->stock_model->get_limit_data(12,0,$data);

		$this->load->view('layout/header', $this->data);
		$this->load->view('search/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
