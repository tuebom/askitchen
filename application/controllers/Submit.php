<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends Public_Controller {

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
		
		// if(!empty($_SESSION["cart_item"])) {
		
		// 	foreach($_SESSION["cart_item"] as $k => $v) {
		// 		unset($_SESSION['cart_item'][$k]);
		// 	}
		// }
		// $this->session->set_userdata('totqty', 0);
		// $this->session->set_userdata('tot_price', 0);
		
		// redirect('/', 'refresh');

		$this->load->view('layout/header', $this->data);
		$this->load->view('submit/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
