<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('golongan_model');
		$this->load->model('provinsi_model');
    }


	public function index()
	{
		// $this->load->view('public/home', $this->data);
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		$this->data['provinsi'] = $this->provinsi_model->get_all();

		$this->load->view('layout/header', $this->data);
		$this->load->view('checkout/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
