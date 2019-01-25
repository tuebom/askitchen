<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
	}

	
	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		$this->load->view('layout/header', $this->data);
		$this->load->view('contact/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
